<?php

class ConnectionType extends ActiveRecord
{

    public $id;
    public $name;
    public $model;

    protected $_table = 'connection_type';

    public function __toString()
    {
        return $this->name;
    }

    public function rules()
    {
        return array(
            array('name', 'length', 'max' => 50),
            array('model', 'length', 'max' => 100),
            array('id, name, model', 'safe', 'on' => 'search'),
        );
    }

    public function getConnectionsByProject(Project $project){
        $connectonModel = $this->getConnectionModel();
        $relationModel = $connectonModel->getProjectRelationModel(); /* @var $relationModel SiteConnectionRelation */
        return $relationModel->findConnectionsByProject($project);
    }

    public function getConnections(){
        $connectionModel = $this->getConnectionModel();
        return $connectionModel->findAll();
    }

    /**
     * @return SiteConnection
     */
    public function getConnectionModel(){
        $connectonModel = call_user_func($this->model.'::model'); /* @var $connectonModel SiteConnection */
        return $connectonModel;
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'model' => 'Model',
        );
    }

    /**
     * @return ConnectionType the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

}
