<?php

class SiteHelper extends CComponent
{

    private $_url;
    private $_redirectUrl;
    private $_body;
    private $_httpCode;
    private $_curl;
    private $_timeout = 30;
    private $_cacheDuration = 86400;

    public function setCacheDuration($duration){
        $this->_cacheDuration = $duration;
    }

    public function setUrl($url)
    {
        $this->_url = $url;
        $this->load();
        return $this;
    }

    public function getUrl()
    {
        return $this->_url;
    }

    public function getRedirectUrl(){
        return $this->_redirectUrl;
    }

    public function load()
    {
        if (!$this->loadFromCache()) {
            $this->loadFromNet();
        }
        return $this;
    }

    public function loadFromCache()
    {
        $curlCache = CurlCache::get($this->_url);
        if (empty($curlCache)) {
            return false;
        }
        $this->_body = $curlCache->body;
        $this->_httpCode = $curlCache->http_code;
        $this->_redirectUrl = $curlCache->redirect_url;
        return true;
    }

    public function loadFromNet()
    {
        $this->initCurl();
        $this->loadWithCurl();
        $this->saveToCache();
    }

    private function initCurl()
    {
        if (empty($this->_curl)) {
            $this->_curl = new CurlHelper();
            $this->_curl->returnTransfer = true;
            $this->_curl->timeout = $this->_timeout;
            $this->_curl->followlocation = false;
        }
        $this->_curl->url = $this->_url;
    }

    private function loadWithCurl()
    {
        $this->_curl->execute();
        $this->_body = $this->_curl->getBody();
        $this->_httpCode = $this->_curl->getHttpCode();
        $this->_redirectUrl = $this->_curl->getRedirectUrl();
    }

    private function saveToCache()
    {
        CurlCache::set($this->_curl, $this->_cacheDuration);
    }

    public function is200()
    {
        return $this->getHttpCode() == 200;
    }

    public function getHttpCode()
    {
        return $this->_httpCode;
    }

    public function getBody()
    {
        return $this->_body;
    }

}
