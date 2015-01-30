<?php

abstract class ActiveRecordForm extends CFormModel
{

    /**
     *
     * @var ActiveRecord
     */
    private $_model;

    abstract function getModelClassName();

    public function setModel(ActiveRecord $model)
    {
        if (get_class($model) !== $this->modelClassName) {
            throw new Exception('fail type of model', 500);
        }
        $this->_model = $model;
        $this->setAttributes($this->_model->getAttributes(),false);

    }

    public function getModel()
    {
        return $this->_model;
    }

    public function create(){
        $modelName = $this->modelClassName;
        $this->_model = new $modelName();
        $this->_model->setAttributes($this->getAttributes(),false);
        $this->_model->save();
        return $this->_model;
    }

    public function update(){
        $this->_model->setAttributes($this->getAttributes(), false);
        return $this->_model->save();
    }
}
