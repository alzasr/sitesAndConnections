<?php

class m000002_000002_connection_type_table extends CDbMigration
{

    private $_table = '{{connection_type}}';

    public function up()
    {
        $this->makeTable();
    }

    private function makeTable()
    {
        $columns = array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT COMMENT \'Идентификатор типа соединения\'',
            'name' => 'varchar(50) COMMENT \'Название типа соединения\'',
            'model' => 'varchar(100) COMMENT \'Название модели соединения\'',

            'PRIMARY KEY (`id`)'
        );
        $this->createTable($this->_table, $columns, 'ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');
    }

    public function down()
    {
        $this->dropTable($this->_table);
    }

}
