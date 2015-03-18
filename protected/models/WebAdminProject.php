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
            array('web_admin_id, project_id', 'required'),
            array('web_admin_id, project_id', 'numerical', 'integerOnly'=>true),
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

    public function getConnectionIdFieldName()
    {
        return 'web_admin_id';
    }


}
