<?php

class Project extends ActiveRecord
{

    public $id;
    public $name;
    public $url;
    protected $_table = 'project';

    /**
     * @var SiteHelper
     */
    private $_siteHelper;

    public function __toString()
    {
        return $this->name;
    }

    public function getSiteHelper(){
        if(empty($this->_siteHelper)){
            $this->_siteHelper = new SiteHelper();
            $this->_siteHelper->setCacheDuration(3600);
            $this->_siteHelper->setUrl($this->url);
        }
        return $this->_siteHelper;
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
