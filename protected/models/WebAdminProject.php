<?php


class WebAdminProject extends SiteConnectionRelation
{

    public $web_admin_id;
    public $project_id;
    public $created;
    protected $_table = 'web_admin_project';

    public function rules()
    {
        return array(
            array('web_admin_id, created', 'required'),
            array('web_admin_id, project_id', 'numerical', 'integerOnly'=>true),
            array('web_admin_id, project_id, created', 'safe', 'on'=>'search'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'web_admin_id' => 'Идентификатор вебадминки',
            'project_id' => 'Идентификатор проекта',
            'created' => 'Дата создания',
        );
    }

    public function relations()
    {
        return array(
            'connection' => array(self::BELONGS_TO,'WebAdmin','web_admin_id')
        );
    }


    /**
     * @return WebAdminProject the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

}
