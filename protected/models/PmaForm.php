<?php

class PmaForm extends ActiveRecordForm
{

    public $name;
    public $host;
    public $login;
    public $password;
    public $server;

    public function attributeLabels()
    {
        return array(
            'name' => 'Название для идентификации',
            'host' => 'Хост',
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
