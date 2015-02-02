<?php

class ConnectionTypeForm extends ActiveRecordForm{

    public $name;
    public $model;

    protected $modelClass = 'ConnectionType';

    public function create()
    {
        if(!class_exists($this->model) || !is_subclass_of($this->model, 'SiteConnection')){
            throw new Exception('Class not found or is not child of SiteConnection', 500);
        }
        return parent::create();
    }

    public function getModelClassName()
    {
       return 'ConnectionType';
    }

}

