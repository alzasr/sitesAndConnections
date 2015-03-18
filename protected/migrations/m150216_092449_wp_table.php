<?php

class m150216_092449_wp_table extends CDbMigration
{

    private $_table = '{{wp}}';

    public function up()
    {
        $this->makeTable();
    }

    private function makeTable()
    {
        $columns = array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT COMMENT \'Идентификатор\'',
            'name' => 'varchar(50) COMMENT \'Название для идентификации\'',
            'site' => 'varchar(100) COMMENT \'Адрес сайта\'',
            'admin_path' => 'varchar(100) COMMENT \'Путь до админки\'',
            'login' => 'varchar(50) COMMENT \'Логин\'',
            'password' => 'varchar(50) COMMENT \'Пароль\'',
            'PRIMARY KEY (`id`)'
        );
        $this->createTable($this->_table, $columns, 'ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');
    }

    public function down()
    {
        $this->dropTable($this->_table);
    }

}
