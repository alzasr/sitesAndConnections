<?php

class PmaForm extends ActiveRecordForm
{

    public $name;
    public $url;
    public $login;
    public $password;
    public $server;

    public function attributeLabels()
    {
        return array(
            'name' => 'Название для идентификации',
            'url' => 'Адрес',
            'login' => 'Логин для доступа',
            'password' => 'Пароль для доступа',
            'server' => 'Сервер',
        );
    }

    public function getModelClassName()
    {
        return 'Pma';
    }

}
