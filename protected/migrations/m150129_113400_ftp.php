<?php

class m150129_113400_ftp extends CDbMigration
{

    private $_table = '{{ftp}}';

    public function up()
    {
        $this->makeTable();
    }

    private function makeTable()
    {
        $columns = array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT COMMENT \'Идентификатор\'',
            'name' => 'varchar(50) COMMENT \'Название для идентификации\'',
            'host' => 'varchar(100) COMMENT \'Хост\'',
            'login' => 'varchar(50) COMMENT \'Логин для доступа\'',
            'password' => 'varchar(50) COMMENT \'Пароль для доступа\'',
            'port' => 'int(11) DEFAULT NULL COMMENT \'Порт\'',
            'PRIMARY KEY (`id`)'
        );
        $this->createTable($this->_table, $columns, 'ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');
    }

    public function down()
    {
        $this->dropTable($this->_table);
    }

}
