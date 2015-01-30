<?php

class m000003_000003_web_admin_table extends CDbMigration
{

    private $_table = '{{web_admin}}';

    public function up()
    {
        $this->makeTable();
    }

    private function makeTable()
    {
        $columns = array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT COMMENT \'Идентификатор\'',
            'name' => 'varchar(50) COMMENT \'Название для идентификации\'',
            'url' => 'varchar(100) COMMENT \'Адрес веб админки\'',
            'login' => 'varchar(50) COMMENT \'Логин для доступа\'',
            'password' => 'varchar(50) COMMENT \'Пароль для доступа\'',
            'PRIMARY KEY (`id`)'
        );
        $this->createTable($this->_table, $columns, 'ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');
    }

    public function down()
    {
        $this->dropTable($this->_table);
    }

}
