<?php

/**
 * Class Request
 */
class Request
{
    private $url;
    private $params;
    private $queryString;

    /**
     * Request constructor.
     * @param $url
     * @param $params
     */
    public function __construct($url, $params)
    {
        $this->url = $url;
        $this->params = $params;
        $this->queryString = http_build_query($this->params);
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getQueryString()
    {
        return $this->queryString;
    }

    /**
     * @param string $queryString
     */
    public function setQueryString($queryString)
    {
        $this->queryString = $queryString;
    }

    /**
     * Perform a GET request
     * @return mixed
     */
    function get(){
        $url = $this->url."?".$this->queryString;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    /**
     * Perform a POST request
     * @return mixed
     */
    function post(){
        $url = $this->url."?".$this->queryString;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->url,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array(
                item1 => 'value',
                item2 => 'value2'
            )
        ));
        $response = curl_exec($curl);
        curl_close($curl)
        ;
        return $response;
    }
}