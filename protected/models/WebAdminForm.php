<?php

class WebAdminForm extends ActiveRecordForm
{

    public $name;
    public $url;
    public $login;
    public $password;
    public $type;

    public function attributeLabels()
    {
        return array(
            'name' => 'Название для идентификации',
            'url' => 'Адрес веб админки',
            'login' => 'Логин для доступа',
            'password' => 'Пароль для доступа',
            'type' => 'Тип',
        );
    }

    public function getModelClassName()
    {
        return 'WebAdmin';
    }

}
