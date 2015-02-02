<?php

class CurlHelper extends CFormModel
{

    const AGENT_MOZILLA = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ru-RU; rv:1.7.12) Gecko/20050919 Firefox/1.0.7';
    const AGENT_OPERA = "Opera/9.80 (Windows NT 6.1; WOW64) Presto/2.12.388 Version/12.14";

    public $url;

    /**
     * флаг вывода дополнительной информации, записывает поток в stderr или файл $stderr
     * @var bool
     */
    public $verbose;

    /**
     * содержимое заголовка  "Accept-Encoding:". Позволяет декодировать запрос.
     * Допустимые значения  "identity", "deflate", "gzip"
     * @var string
     */
    public $encoding;

    /**
     * Включать или нет заголовки в вывод
     * @var bool
     */
    public $header;

    /**
     * флаг отслеживания строки запроса дескриптора
     * @var bool
     */
    public $headerOut;

    /**
     * флаг возврата резальтата передачи вместо вывода прямо в браузер
     * @var bool
     */
    public $returnTransfer = true;

    /**
     * количество секунд ожидания при попытке соединения. 0 - бесконечное ожидание
     * @var int
     */
    public $connectTimeout;

    /**
     * количество секунд для выполнения операции (curl запроса)
     * @var int
     */
    public $timeout;

    /**
     * массив HTTP-заголовков
     * @var string[]
     */
    public $httpheader;

    /**
     * флаг проверки ssl сертификата узла
     * @var bool
     */
    public $ssl_verifypeer;

    /**
     * cодержимое заголовка "User-Agent: "
     * @var string
     */
    public $useragent;

    /**
     *  имя файла для хранения cookies текущего запроса
     * @var string
     */
    public $cookiejar;

    /**
     * имя файла для получения cookies
     * @var string
     */
    public $cookiefile;

    /**
     * данные для передачи методом POST
     * @var string | array
     */
    public $postfields;

    /**
     * Признак POST запроса
     * @var true
     */
    public $post;

    /**
     * TRUE для подробного отчета при неудаче, если полученный HTTP-код
     * больше или равен 400. Поведение по умолчанию возвращает страницу
     * как обычно, игнорируя код.
     * @var bool
     */
    public $failonerror;

    /**
     * Используйте 1 для проверки существования общего имени в сертификате SSL.
     * Используйте 2 для проверки существования общего имени и также его
     * совпадения с указанным хостом. В боевом окружении значение этого
     * параметра должно быть 2 (установлено по умолчанию).
     * @var int
     */
    public $ssl_verifyhost;
    public $cookiesession;

    /**
     * Флаг, переходить ли по редиректам
     * @var bool
     */
    public $followlocation;

    /**
     * максимально число переходов
     * @var int
     */
    public $maxredirs;
    private $_curl;
    private $_body;
    private $_info;
    private $_errno;
    private $_error;
    private $_timeExecute;

    public function rules()
    {
        return array(
            array(
                'url,verbose,enconding,header,headerOut,returnTransfer,connectTimeout,timeout', 'safe'
            )
        );
    }

    public function execute()
    {

        $this->initCurl();
        $startTime = microtime(true);
        $this->_body = curl_exec($this->_curl);
        $this->_timeExecute = microtime(true) - $startTime;
        $this->_info = curl_getinfo($this->_curl);
        if($this->timeout && $this->_timeExecute > $this->timeout){
            $this->_info['http_code'] = 503;
        }
        $this->_errno = curl_errno($this->_curl);
        $this->_error = curl_error($this->_curl);

        return $this->is200();
    }

    public function getTimeExecute()
    {
        return $this->_timeExecute;
    }

    public function getBody()
    {
        return $this->_body;
    }

    public function getHttpCode()
    {
        return $this->_info['http_code'];
    }

    public function getCurlErrno()
    {
        return $this->_errno;
    }

    public function getCurlInfo()
    {
        return $this->_info;
    }

    public function getCurlError()
    {
        return $this->_error;
    }

    public function is200()
    {
        return $this->getHttpCode() == 200;
    }

    public function getRedirectUrl()
    {
//        return curl_getinfo($this->_curl,CURLINFO_EFFECTIVE_URL);
        $matches = array();
        preg_match('/Location:(.*?)\n/', $this->getBody(), $matches);
        return isset($matches[1]) ? trim($matches[1]) : '';
    }

    private function initCurl()
    {
        //if (empty($this->_curl)) {
        $this->_curl = curl_init();
        //}
        //curl_reset($this->_curl);
        $this->setCurlOpt();
        if (!is_null($this->headerOut)) {
            curl_setopt($this->_curl, CURLINFO_HEADER_OUT, $this->headerOut);
        }
    }

    private function setCurlOpt()
    {
        foreach ($this->attributeNames() as $attribute) {
            $curlOpt = 'CURLOPT_' . mb_strtoupper($attribute);
//            echo $curlOpt . "\n";
            if (defined($curlOpt) && !is_null($this->$attribute)) {
                curl_setopt($this->_curl, constant($curlOpt), $this->$attribute);
            }
        }
    }

    public function __destruct()
    {
        if (!empty($this->_curl)) {
            curl_close($this->_curl);
        }
    }

}
