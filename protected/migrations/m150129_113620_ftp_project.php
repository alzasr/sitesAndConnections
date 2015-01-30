<?php

class m150129_113620_ftp_project extends CDbMigration
{

    private $_table = '{{ftp_project}}';

    public function up()
    {
        $this->makeTable();
    }

    private function makeTable()
    {
        $columns = array(
            'ftp_id' => 'int(11) NOT NULL COMMENT \'Идентификатор ftp\'',
            'project_id' => 'int(11) COMMENT \'Идентификатор проекта\'',
            'created' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT \'Дата создания\'',
            'PRIMARY KEY (`ftp_id`,`project_id`)'
        );
        $this->createTable($this->_table, $columns, 'ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    public function down()
    {
        $this->dropTable($this->_table);
    }

}
