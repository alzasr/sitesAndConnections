<?php

class Wp extends SiteConnection
{

    public $id;
    public $name;
    public $site;
    public $admin_path;
    public $login;
    public $password;
    protected $_table = 'wp';

    public function rules()
    {
        return array(
            array('name, login, password', 'length', 'max'=>50),
            array('site, admin_path', 'length', 'max'=>100),
            array('id, name, site, admin_path, login, password', 'safe', 'on'=>'search'),
        );
    }


    /**
     * @return Wp the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function formModelFactory()
    {
        return new WpForm();
    }

    public function getProjectRelationModelName()
    {
        return 'WpProject';
    }

}
