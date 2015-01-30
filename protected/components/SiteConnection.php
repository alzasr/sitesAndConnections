<?php

abstract class SiteConnection extends ActiveRecord
{

    protected $id;
    protected $name;

    /**
     * @var ActiveRecordForm
     */
    private $_formModel;

    public function __toString()
    {
        return $this->getName();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    abstract function getProjectRelationModelName();

    final function getProjectRelationModel()
    {
        return call_user_func($this->getProjectRelationModel() . '::model');
    }

    final function appendToProject(Project $project)
    {
        
    }

    final public function getFormModel()
    {
        if (empty($this->_formModel)) {
            $this->_formModel = $this->formModelFactory();
            $this->_formModel->setAttributes($this->getAttributes(), false);
        }
        return $this->_formModel;
    }

    /**
     * @return ActiveRecordForm
     */
    abstract function formModelFactory();
}
