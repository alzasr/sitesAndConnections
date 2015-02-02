<?php

class CurlCache extends ActiveRecord
{

    public $url;
    public $url_md5;
    public $redirect_url;
    public $body;
    public $http_code;
    public $expired;
    protected $_table = 'curl_cache';

    /**
     *
     * @return $this
     */
    public static function get($url)
    {
        $cache = self::model()->notExpired()->byUrl($url)->find();
        return $cache;
    }

    public function byUrl($url)
    {
        $url = trim(mb_strtolower($url));
        $this->addEqualCondition('url_md5', md5($url));
        $this->addEqualCondition('url', $url);
        return $this;
    }

    public function notExpired()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('`expired` > now()');
        $this->getDbCriteria()->mergeWith($criteria);
        return $this;
    }

    public function primaryKey()
    {
        return 'url';
    }

    public static function set(CurlHelper $curl, $expired = 600)
    {
        $url = trim(mb_strtolower($curl->url));
        self::model()->lockTable();
        try {
            $cache = self::model()->byUrl($url)->find();
            if (empty($cache)) {
                $cache = new self();
                $cache->url = $url;
                $cache->url_md5 = md5($url);
            }
            $cache->body = $curl->getBody();
            $cache->http_code = $curl->getHttpCode();
            $cache->redirect_url = $curl->getRedirectUrl();
            $exp = new CDbExpression('NOW() + INTERVAL ' . (int) $expired . ' SECOND');
            $cache->expired = $exp;
            $cache->save();
            self::model()->unlockTable();
        } catch (Exception $exc) {
            self::model()->unlockTable();
            throw $exc;
        }
    }

    public function rules()
    {
        return array(
            array('url, http_code, expired', 'required'),
            array('url', 'length', 'max' => 1024),
        );
    }

    public function attributeLabels()
    {
        return array(
            'url' => 'адрес',
            'body' => 'Тело ответа',
            'expired' => 'Дата истечения',
        );
    }

    /**
     * @return CurlCache the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

}
