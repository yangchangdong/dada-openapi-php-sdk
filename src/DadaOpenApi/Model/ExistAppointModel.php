<?php
/**
 * Created by PhpStorm.
 * User: yangchangdong
 * Date: 2019/10/11
 * Time: 11:46 AM
 */

namespace DadaOpenApi\Model;


class ExistAppointModel
{
    /**
     * @var
     * 追加的第三方订单ID
     */
    public $order_id;
    /**
     * @var
     * 追加的配送员ID
     */
    public $transporter_id;
    /**
     * @var
     * 追加订单的门店编码
     */
    public $shop_no;

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
    public function getTransporterId()
    {
        return $this->transporter_id;
    }

    /**
     * @param mixed $transporter_id
     */
    public function setTransporterId($transporter_id)
    {
        $this->transporter_id = $transporter_id;
    }

    /**
     * @return mixed
     */
    public function getShopNo()
    {
        return $this->shop_no;
    }

    /**
     * @param mixed $shop_no
     */
    public function setShopNo($shop_no)
    {
        $this->shop_no = $shop_no;
    }

    

}