<?php
/**
 * Created by PhpStorm.
 * User: yangchangdong
 * Date: 2019/10/11
 * Time: 11:30 AM
 */

namespace DadaOpenApi\Model;

/**
 * Class FormalCancelOrderModel
 * @package DadaOpenApi\Model
 * 取消原因 Model
 */
class FormalCancelOrderModel
{
    /**
     * @String 第三方订单编号
     */
    public $order_id;
    /**
     * @Integer 取消原因ID（取消原因列表）
     */
    public $cancel_reason_id;
    /**
     * @String
     * 取消原因(当取消原因ID为其他时，此字段必填)
     */
    public $cancel_reason;

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
    public function getCancelReasonId()
    {
        return $this->cancel_reason_id;
    }

    /**
     * @param mixed $cancel_reason_id
     */
    public function setCancelReasonId($cancel_reason_id)
    {
        $this->cancel_reason_id = $cancel_reason_id;
    }

    /**
     * @return mixed
     */
    public function getCancelReason()
    {
        return $this->cancel_reason;
    }

    /**
     * @param mixed $cancel_reason
     */
    public function setCancelReason($cancel_reason)
    {
        $this->cancel_reason = $cancel_reason;
    }


}