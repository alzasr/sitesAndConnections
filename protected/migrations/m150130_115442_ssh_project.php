<?php

class m150130_115442_ssh_project extends CDbMigration
{

    private $_table = '{{ssh_project}}';

    public function up()
    {
        $this->makeTable();
    }

    private function makeTable()
    {
        $columns = array(
            'ssh_id' => 'int(11) NOT NULL COMMENT \'Идентификатор ssh\'',
            'project_id' => 'int(11) COMMENT \'Идентификатор проекта\'',
            'created' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT \'Дата создания\'',
            'PRIMARY KEY (`ssh_id`,`project_id`)'
        );
        $this->createTable($this->_table, $columns, 'ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    public function down()
    {
        $this->dropTable($this->_table);
    }

}
