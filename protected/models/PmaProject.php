<?php

class PmaProject extends SiteConnectionRelation
{

    public $pma_id;
    public $project_id;
    public $created;
    protected $_table = 'pma_project';

    public function rules()
    {
        return array(
            array('pma_id, project_id', 'required'),
            array('pma_id, project_id', 'numerical', 'integerOnly' => true),
            array('pma_id, project_id, created', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'pma_id' => 'Идентификатор pma',
            'project_id' => 'Идентификатор проекта',
            'created' => 'Дата создания',
        );
    }

    public function relations()
    {
        return array(
            'connection' => array(self::BELONGS_TO, 'Pma', 'pma_id'),
        );
    }

    /**
     * @return PmaProject the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function getConnectionIdFieldName()
    {
        return 'pma_id';
    }

}
