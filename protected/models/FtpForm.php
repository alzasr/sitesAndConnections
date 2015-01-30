<?php

class FtpForm extends ActiveRecordForm
{

    public $name;
    public $host;
    public $login;
    public $password;
    public $port;

    public function attributeLabels()
    {
        return array(
            'name' => 'Название для идентификации',
            'host' => 'Хост',
            'login' => 'Логин для доступа',
            'password' => 'Пароль для доступа',
            'port' => 'Порт',
        );
    }

    public function getModelClassName()
    {
        return 'Ftp';
    }

}
