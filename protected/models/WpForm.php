<?php

class WpForm extends ActiveRecordForm
{

    public $name;
    public $site;
    public $admin_path;
    public $login;
    public $password;

   public function attributeLabels()
    {
        return array(
            'id' => 'Идентификатор',
            'name' => 'Название для идентификации',
            'site' => 'Адрес сайта',
            'admin_path' => 'Путь до админки',
            'login' => 'Логин',
            'password' => 'Пароль',
        );
    }

    public function getModelClassName()
    {
        return 'Wp';
    }

}