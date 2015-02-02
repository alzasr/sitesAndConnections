<?php

class m150130_121000_pma_project extends CDbMigration
{

    private $_table = '{{pma_project}}';

    public function up()
    {
        $this->makeTable();
    }

    private function makeTable()
    {
        $columns = array(
            'pma_id' => 'int(11) NOT NULL COMMENT \'Идентификатор pma\'',
            'project_id' => 'int(11) COMMENT \'Идентификатор проекта\'',
            'created' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT \'Дата создания\'',
            'PRIMARY KEY (`pma_id`,`project_id`)'
        );
        $this->createTable($this->_table, $columns, 'ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    public function down()
    {
        $this->dropTable($this->_table);
    }

}
