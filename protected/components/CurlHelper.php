<?php

class CurlHelper extends CComponent
{

    public $url;
    public $verbose = 0;
    public $encoding = 0;
    public $header = 0;
    public $headerOut = 1;
    public $returnTransfer = 1;
    public $connectTimeout = 3;
    public $timeout = 3;
    public $post;

    private $_curl;
    private $_body;
    private $_info;

    public function execute()
    {
        if(empty($this->_curl)){
            $this->init();
        }
        $this->setCurlUrl();
        $this->_body = curl_exec($this->_curl);
        $this->_info = curl_getinfo($this->_curl);
        return $this->is200();
    }

    public function getBody(){
        return $this->_body;
    }

    public function getHttpCode(){
        return $this->_info['http_code'];
    }

    public function is200(){
        return $this->getHttpCode() == 200;
    }

    private function setCurlUrl(){
        curl_setopt($this->_curl, CURLOPT_URL, $this->url);
    }

    private function init()
    {
        $this->_curl = curl_init();
        if (!is_null($this->verbose)) {
            curl_setopt($this->_curl, CURLOPT_VERBOSE, $this->verbose);
        }
        if (!is_null($this->encoding)) {
            curl_setopt($this->_curl, CURLOPT_ENCODING, $this->encoding);
        }
        if (!is_null($this->header)) {
            curl_setopt($this->_curl, CURLOPT_HEADER, $this->header);
        }
        if (!is_null($this->headerOut)) {
            curl_setopt($this->_curl, CURLINFO_HEADER_OUT, $this->headerOut);
        }
        if (!is_null($this->returnTransfer)) {
            curl_setopt($this->_curl, CURLOPT_RETURNTRANSFER, $this->returnTransfer);
        }
        if (!is_null($this->connectTimeout)) {
            curl_setopt($this->_curl, CURLOPT_CONNECTTIMEOUT, $this->connectTimeout);
        }
        if (!is_null($this->timeout)) {
            curl_setopt($this->_curl, CURLOPT_TIMEOUT, $this->timeout);
        }
        if(!is_null($this->post)){
            curl_setopt($this->_curl, CURLOPT_POST, $this->post);
        }
    }

    public function setPostFields($array){
        curl_setopt($this->_curl, CURLOPT_POSTFIELDS, $array);
    }

}
