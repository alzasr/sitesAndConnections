<?php

class WebAdmin extends SiteConnection
{

    public $id;
    public $name;
    public $url;
    public $login;
    public $password;
    protected $_table = 'web_admin';

    public function rules()
    {
        return array(
            array('name, login, password', 'length', 'max'=>50),
            array('url', 'length', 'max'=>100),
            array('id, name, url, login, password', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return WebAdmin the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function getProjectRelationModelName()
    {
        return 'WebAdminProject';
    }

    public function formModelFactory()
    {
        return new WebAdminForm();
    }

}
