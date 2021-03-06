<?php
namespace Wangjian\Alivod;

class AliyunVodRequest {
    /**
     * the request parameters
     * @var array
     */
    protected $parameters = [];

    /**
     * the request method
     * @var string
     */
    protected $method;

    /**
     * AliyunVodRequest constructor.
     * @param array $parameters
     * @param string $method
     */
    public function __construct($parameters, $method = 'GET') {
        $this->parameters = $parameters;
        $this->method = $method;
    }

    public function __get($parameter) {
        return isset($this->parameters[$parameter]) ? $this->parameters[$parameter] : null;
    }

    public function __set($parameter, $value) {
        $this->parameters[$parameter] = $value;

        return $value;
    }

    /**
     * get/set the request paramters
     * @param array|null $parameters
     * @return array
     */
    public function parameters($parameters = null) {
        if(!is_null($parameters)) {
            $this->parameters = $parameters;
        }

        return $this->parameters;
    }

    /**
     * get/set the request method
     * @param string|null $method
     * @return string
     */
    public function method($method = null) {
        if(!is_null($method)) {
            $this->method = $method;
        }

        return $this->method;
    }

    /**
     * convert the request parameter array to urlencoded query string
     * @return string
     */
    public function serialize() {
        $queryString = '';

        foreach($this->parameters as $key => $value) {
            $queryString .= urlencode($key) . '=' . urlencode($value) . '&';
        }

        return rtrim($queryString, '&');
    }
}