<?php

class m000004_000004_web_admin_project_table extends CDbMigration
{

    private $_table = '{{web_admin_project}}';

    public function up()
    {
        $this->makeTable();
    }

    private function makeTable()
    {
        $columns = array(
            'web_admin_id' => 'int(11) NOT NULL COMMENT \'Идентификатор вебадминки\'',
            'project_id' => 'int(11) COMMENT \'Идентификатор проекта\'',
            'created' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT \'Дата создания\'',
            'PRIMARY KEY (`web_admin_id`,`project_id`)'
        );
        $this->createTable($this->_table, $columns, 'ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    public function down()
    {
        $this->dropTable($this->_table);
    }

}
