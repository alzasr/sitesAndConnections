<?php

class FtpProject extends SiteConnectionRelation
{

    public $ftp_id;
    public $project_id;
    public $created;
    protected $_table = 'ftp_project';

    public function rules()
    {
        return array(
            array('ftp_id, created', 'required'),
            array('ftp_id, project_id', 'numerical', 'integerOnly' => true),
            array('ftp_id, project_id, created', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'ftp_id' => 'Идентификатор ftp',
            'project_id' => 'Идентификатор проекта',
            'created' => 'Дата создания',
        );
    }

    public function relations()
    {
        return array(
            'connection' => array(self::BELONGS_TO, 'Ftp', 'ftp_id'),
        );
    }

    /**
     * @return FtpProject the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function getConnectionIdFieldName()
    {
        return 'ftp_id';
    }

}
