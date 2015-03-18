<?php

class m150216_092905_wp_project_table extends CDbMigration
{

    private $_table = '{{wp_project}}';

    public function up()
    {
        $this->makeTable();
    }

    private function makeTable()
    {
        $columns = array(
            'wp_id' => 'int(11) NOT NULL COMMENT \'Идентификатор wp\'',
            'project_id' => 'int(11) COMMENT \'Идентификатор проекта\'',
            'created' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT \'Дата создания\'',
            'PRIMARY KEY (`wp_id`,`project_id`)'
        );
        $this->createTable($this->_table, $columns, 'ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    public function down()
    {
        $this->dropTable($this->_table);
    }

}
