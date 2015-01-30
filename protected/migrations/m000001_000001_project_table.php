<?php

class m000001_000001_project_table extends CDbMigration
{

    private $_table = '{{project}}';

    public function up()
    {
        $this->makeTable();
    }

    private function makeTable()
    {
        $columns = array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT COMMENT \'Идентификатор\'',
            'name' => 'varchar(50) COMMENT \'Название\'',
            'url' => 'varchar(100) COMMENT \'Интернет адрес\'',
            'PRIMARY KEY (`id`)'
        );
        $this->createTable($this->_table, $columns, 'ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');
    }

    public function down()
    {
        $this->dropTable($this->_table);
    }

}
