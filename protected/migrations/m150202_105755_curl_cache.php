<?php

class m150202_105755_curl_cache extends CDbMigration
{

    private $_table = '{{curl_cache}}';

    public function up()
    {
        $columns = array(
            'url' => 'varchar(1024) NOT NULL COMMENT \'адрес\'',
            'url_md5' => 'char(32) NOT NULL COMMENT \'Хеш урла\'',
            'redirect_url' => 'varchar(1024) COMMENT \'Адрес при переадресации\'',
            'body' => 'text COMMENT \'Тело ответа\'',
            'http_code' => 'int(11) COMMENT \'HTTP код ответа\'',
            'expired' => 'timestamp NOT NULL COMMENT \'Дата истечения\'',
            'KEY `url_md5` (`url_md5`)',
        );
        $this->createTable($this->_table, $columns, 'ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');
    }

    public function down()
    {
        $this->dropTable($this->_table);
    }

}
