<?php

class Pma extends SiteConnection
{

    public $id;
    public $name;
    public $host;
    public $login;
    public $password;
    public $server;
    protected $_table = 'pma';

    public function rules()
    {
        return array(
            array('name, login, password', 'length', 'max'=>50),
            array('host', 'length', 'max'=>100),
        );
    }




    /**
     * @return Pma the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function getProjectRelationModelName()
    {
        return 'PmaProject';
    }

    public function formModelFactory()
    {
        return new PmaForm();
    }

}
