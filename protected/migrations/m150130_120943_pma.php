<?php

class m150130_120943_pma extends CDbMigration
{

    private $_table = '{{pma}}';

    public function up()
    {
        $this->makeTable();
    }

    private function makeTable()
    {
        $columns = array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT COMMENT \'Идентификатор\'',
            'name' => 'varchar(50) COMMENT \'Название для идентификации\'',
            'url' => 'varchar(100) COMMENT \'Веб адрес\'',
            'login' => 'varchar(50) COMMENT \'Логин для доступа\'',
            'password' => 'varchar(50) COMMENT \'Пароль для доступа\'',
            'server' => 'varchar(50) COMMENT \'Сервер\'',
            'PRIMARY KEY (`id`)'
        );
        $this->createTable($this->_table, $columns, 'ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');
    }

    public function down()
    {
        $this->dropTable($this->_table);
    }

}
