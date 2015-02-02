<?php

class Ssh extends SiteConnection
{

    public $id;
    public $name;
    public $host;
    public $login;
    public $password;
    public $port;
    protected $_table = 'ssh';

    public function rules()
    {
        return array(
            array('port', 'numerical', 'integerOnly'=>true),
            array('name, login, password', 'length', 'max'=>50),
            array('host', 'length', 'max'=>100),
            array('id, name, host, login, password, port', 'safe', 'on'=>'search'),
        );
    }




    /**
     * @return Ssh the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function getProjectRelationModelName()
    {
        return 'SshProject';
    }

    public function formModelFactory()
    {
        return new SshForm();
    }

}
