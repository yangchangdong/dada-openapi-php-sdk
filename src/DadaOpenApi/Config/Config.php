<?php
/**
 * config 文件
 * @author yangchangdong
 */
namespace DadaOpenApi\Config;

/**
 * Class Config
 * @package DadaOpenApi\Config
 * config 配置项
 */
class Config{

    /**
     * 达达开发者app_key
     */
    public $app_key = '';

    /**
     * 达达开发者app_secret
     */
    public $app_secret = '';

    /**
     * api版本
     */
    public $v = "1.0";

    /**
     * 数据格式
     */
    public $format = "json";

    /**
     * 商户ID
     */
    public $source_id;

    /**
     * host
     */
    public $host;



    /**
     * 构造函数
     */
    public function __construct($source_id, $online){
        if ($online) {
            $this->source_id = $source_id;
            $this->host = "https://newopen.imdada.cn";
        } else {
            $this->source_id = "73753";
            $this->host = "http://newopen.qa.imdada.cn";
        }
    }

    public function getAppKey(){
        return $this->app_key;
    }

    public function getAppSecret(){
        return $this->app_secret;
    }

    public function getV(){
        return $this->v;
    }

    public function getFormat(){
        return $this->format;
    }

    public function getSourceId(){
        return $this->source_id;
    }

    public function getHost(){
        return $this->host;
    }

    /**
     * @param mixed $app_key
     */
    public function setAppKey($app_key)
    {
        $this->app_key = $app_key;
    }

    /**
     * @param mixed $app_secret
     */
    public function setAppSecret($app_secret)
    {
        $this->app_secret = $app_secret;
    }

    /**
     * @param mixed $v
     */
    public function setV($v)
    {
        $this->v = $v;
    }

    /**
     * @param mixed $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @param mixed $source_id
     */
    public function setSourceId($source_id)
    {
        $this->source_id = $source_id;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }


}
