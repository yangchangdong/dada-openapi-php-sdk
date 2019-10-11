<?php
/**
 * Created by PhpStorm.
 * User: yangchangdong
 * Date: 2019/10/11
 * Time: 12:02 PM
 */

namespace DadaOpenApi\Model;

/**
 * Class DadaComplaintModel
 * @package DadaOpenApi\Model
 * 投诉dada model
 */
class DadaComplaintModel
{
    /**
     * @String 第三方订单编号
     */
    public $order_id;
    /**
     * @Integer 投诉原因ID（投诉原因列表）
     */
    public $reason_id;

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
    public function getReasonId()
    {
        return $this->reason_id;
    }

    /**
     * @param mixed $reason_id
     */
    public function setReasonId($reason_id)
    {
        $this->reason_id = $reason_id;
    }


}