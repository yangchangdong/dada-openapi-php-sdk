<?php
/**
 * Created by PhpStorm.
 * User: yangchangdong
 * Date: 2019/10/11
 * Time: 10:45 AM
 */

namespace DadaOpenApi\Model;

/**
 * Class TipModel
 * @package DadaOpenApi\Model
 * 添加小费
 */
class TipModel
{
    /**
     * @var
     * 第三方订单编号
     */
    public $order_id;
    /**
     * @var
     * 小费金额(精确到小数点后一位，单位：元)
     */
    public $tips;
    /**
     * @var
     * 订单城市区号
     */
    public $city_code;
    /**
     * @var
     * 备注(字段最大长度：512)
     */
    public $info;

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @return mixed
     */
    public function getTips()
    {
        return $this->tips;
    }

    /**
     * @param mixed $tips
     */
    public function setTips($tips)
    {
        $this->tips = $tips;
    }

    /**
     * @return mixed
     */
    public function getCityCode()
    {
        return $this->city_code;
    }

    /**
     * @param mixed $city_code
     */
    public function setCityCode($city_code)
    {
        $this->city_code = $city_code;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    
}