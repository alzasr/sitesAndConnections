<?php

class SshProject extends SiteConnectionRelation
{

    public $ssh_id;
    public $project_id;
    public $created;
    protected $_table = 'ssh_project';

    public function rules()
    {
        return array(
            array('ssh_id, project_id', 'required'),
            array('ssh_id, project_id', 'numerical', 'integerOnly' => true),
            array('ssh_id, project_id, created', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'ssh_id' => 'Идентификатор ssh',
            'project_id' => 'Идентификатор проекта',
            'created' => 'Дата создания',
        );
    }

    public function relations()
    {
        return array(
            'connection' => array(self::BELONGS_TO, 'Ssh', 'ssh_id'),
        );
    }

    /**
     * @return SshProject the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function getConnectionIdFieldName()
    {
        return 'ssh_id';
    }

}
