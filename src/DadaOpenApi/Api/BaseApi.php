<?php
/**
 * base api
 * @author yangchangdong
 * Date: 2019/10/10
 */
namespace DadaOpenApi\Api;

class BaseApi{
    
    private $url;
    
    private $businessParams;

    /**
     * BaseApi constructor.
     * @param $url
     * @param $params
     * 构造
     */
    public function __construct($url, $params) {
        $this->url = $url;
        $this->businessParams = $params;
    }

    public function getUrl(){
        return $this->url;
    }

    /**
     * @return mixed
     * 获取 businessParams
     */
    public function getBusinessParams(){
        return $this->businessParams;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @param mixed $businessParams
     */
    public function setBusinessParams($businessParams)
    {
        $this->businessParams = $businessParams;
    }

    

}
