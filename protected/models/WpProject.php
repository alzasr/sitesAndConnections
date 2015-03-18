<?php

class WpProject extends SiteConnectionRelation
{

    public $wp_id;
    public $project_id;
    public $created;
    protected $_table = 'wp_project';

    public function rules()
    {
        return array(
            array('wp_id, project_id', 'required'),
            array('wp_id, project_id', 'numerical', 'integerOnly'=>true),
        );
    }

    public function relations()
    {
        return array(
            'connection' => array(self::BELONGS_TO,'Wp','wp_id')
        );
    }

    /**
     * @return WpProject the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function getConnectionIdFieldName()
    {
        return 'wp_id';
    }

}
