<?php

class m150205_131232_web_admin_alter_table extends CDbMigration
{

    private $_table = '{{web_admin}}';

    public function up()
    {
        $this->addColumn($this->_table, 'type', 'enum(\'default\',\'beget\',\'fastvps\') NOT NULL DEFAULT \'default\' COMMENT \'Тип веб админки\'');
    }

    public function down()
    {
        $this->dropColumn($this->_table, 'type');
    }

}
