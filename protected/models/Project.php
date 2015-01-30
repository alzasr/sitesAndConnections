<?php

class Project extends ActiveRecord
{

    public $id;
    public $name;
    public $url;
    protected $_table = 'project';

    public function __toString()
    {
        return $this->name;
    }

    public function rules()
    {
        return array(
            array('name', 'length', 'max'=>50),
            array('url', 'length', 'max'=>100),
            array('id, name, url', 'safe', 'on'=>'search'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
        );
    }


    /**
     * @return Project the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
