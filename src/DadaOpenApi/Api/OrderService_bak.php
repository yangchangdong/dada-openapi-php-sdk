<?php

namespace MtOpenApi\Api;


class OrderServiceBak extends RequestService
{
    //取消原因
    public $cancelReason = [
        2001=>"APP方商家超时接单",
        2002=>"APP方非顾客原因修改订单",
        2003=>"APP方非顾客原因取消订单",
        2004=>"APP方配送延迟",
        2005=>"APP方售后投诉",
        2006=>"APP方用户要求取消",
        2007=>"APP方其他原因取消（未传code，默认为此原因）",
        2008=>"店铺太忙",
        2009=>"商品已售完",
        2010=>"地址无法配送",
        2011=>"店铺已打烊",
        2012=>"联系不上用户",
        2013=>"重复订单",
        2014=>"配送员取餐慢",
        2015=>"配送员送餐慢",
        2016=>"配送员丢餐、少餐、餐洒",
    ];

    /**
     * @param $order_id
     * @return mixed
     * @throws \Exception
     * order/poi_received 设订单为商家已收到
     */
    public function poi_received_order($order_id)
    {
        $params = array(
            'order_id'=>$order_id
        );
        return $this->call('order/poi_received',$params);
    }

    /** 确认接单
     * @doc
     * @param string $order_id
     * @return mixed
     * https://developer.waimai.meituan.com/home/docDetail/109
     */
    public function confirm_order($order_id)
    {
        $params = array(
            'order_id'=>$order_id
        );
        return $this->call("order/confirm", $params);
    }

    /**
     * @doc http://mss.sankuai.com/v1/mss_mt_tenant_2230562/static/doc/doc.html#8.3
     * @param  string $order_id
     * @return mixed
     * https://developer.waimai.meituan.com/home/docDetail/109
     *
     */

    /** 取消接单
     * @doc http://mss.sankuai.com/v1/mss_mt_tenant_2230562/static/doc/doc.html#8.3
     * @param $order_id long 订单ID
     * @param $reason string 取消原因
     * @param $reason_code int 规范化取消原因code
     * @return mixed
     * @throws \Exception
     *
     */
    public function cancel_order($order_id,$reason,$reason_code)
    {
        $params = array(
            'order_id'      =>$order_id,
            'reason'        =>$reason,
            'reason_code'   =>$reason_code,
        );
        return $this->call("order/cancel", $params);
    }

    /** 订单配送中，设置订单为配送中
     * @param $order_id
     * @param $courier_name
     * @param $courier_phone
     * @return mixed
     * @throws \Exception
     * https://developer.waimai.meituan.com/home/docDetail/115
     */
    public function delivering_order($order_id,$courier_name,$courier_phone)
    {
        $params = array(
            'order_id'      =>$order_id,
            'courier_name'  =>$courier_name,
            'courier_phone' =>$courier_phone,
        );
        return $this->call("order/delivering", $params);
    }

    /** 订单已送达
     * @param $order_id
     * @return mixed
     * @throws \Exception
     * https://developer.waimai.meituan.com/home/docDetail/118
     */
    public function arrived_order($order_id)
    {
        $params = array(
            'order_id'       =>$order_id,
        );
        return $this->call("order/arrived", $params);
    }


    /**
     * 同意退款  订单确认退款请求（必接）
     * @param $refund_id
     * @return mixed
     * https://developer.waimai.meituan.com/home/docDetail/121
     */
    public function agreed_refund_order($refund_id,$reason='好商家同意退款')
    {
        $params = array(
            'order_id'  =>$refund_id,
            'reason'    =>$reason,
        );
        return $this->call('order/refund/agree',$params);
    }

    /**
     * 不同意退款 驳回订单退款申请（必接）order/refund/reject
     * @param $refund_id
     * @return mixed
     */
    public function reject_refund_order($refund_id,$reason="商家不同意退款")
    {
        $params = array(
            'order_id'  =>$order_id,
            'reason'    =>$reason,
        );
        return $this->call('order/refund/reject',$params);
    }

    /** 查询订单状态
     * @param $order_id
     * @return mixed
     * @throws \Exception
     */
    public function viewstatus_order($order_id)
    {
        $params = array(
            'order_id'=>$order_id
        );
        return $this->call('order/viewstatus',$params);
    }


    /** 查询活动信息
     * @param $act_detail_id
     * @return mixed {"id":71,"poi_policy":"{\"full_price\":15,\"gift_name\":\"么么\",\"gift_price\":1,\"mt_charge\":0.00,\"poi_charge\":1}","remark":"满赠","start_time":1432742400,"end_time":1432915200,"type":5}
     * @throws \Exception
     * https://developer.waimai.meituan.com/home/docDetail/130
     */
    public function getActDetailByAcId($act_detail_id)
    {
        $params = array(
            'act_detail_id'=>$act_detail_id
        );
        return $this->call('order/getActDetailByAcId',$params);
    }

    /**
     * 获取订单详细信息
     * @doc http://mss.sankuai.com/v1/mss_mt_tenant_2230562/static/doc/doc.html#8.11
     * @param $order_id
     * @param int $is_mt_logistics 是否为美团配送 （当需要查询美团配送的详细信息时此字段需要为1）
     * @return mixed
     */
    public function getOrderDetail($order_id,$is_mt_logistics=0)
    {
        $params = array(
            'order_id'=>$order_id
        );
        return $this->call('order/getOrderDetail',$params);
    }



    /**
     * 查询部分退款菜品详情
     * @doc http://mss.sankuai.com/v1/mss_mt_tenant_2230562/static/doc/doc.html#8.21
     * @param $refund_id
     * @return mixed
     */
    public function getPartRefundFoods($order_id)
    {
        $params = array(
            'order_id'=>$order_id
        );
        return $this->call('order/getPartRefundFoods',$params);
    }


    /** 获取最新日订单流水号
     * @param $app_poi_code
     * @return mixed
     * @throws \Exception
     *
     */
    public function getOrderDaySeq($app_poi_code)
    {
        $params = array(
            'app_poi_code'=>$app_poi_code
        );
        return $this->call('order/getOrderDaySeq',$params);
    }

    /**根据流水号获取订单ID
     * @param $app_poi_code APP方门店ID
     * @param $date_time 日期，整形数据
     * @param $day_seq 订单流水号 int
     * @return mixed
     * @throws \Exception
     *
     */
    public function getOrderIdByDaySeq($app_poi_code,$date_time,$day_seq)
    {
        $params = array(
            'app_poi_code'  =>$app_poi_code,
            'date_time'     =>$date_time,
            'day_seq'       =>$day_seq,
        );
        return $this->call('order/getOrderDaySeq',$params);
    }

    /**发起部分退款申请
     * @param $order_id
     * @param $reason
     * @param $food_data
     * @return mixed
     * @throws \Exception
     *
     */
    public function applyPartRefund($order_id,$reason,$food_data)
    {
        $params = array(
            'app_poi_code'  =>$app_poi_code,
            'date_time'     =>$date_time,
            'food_data'     =>$food_data,
        );
        return $this->call('order/applyPartRefund',$params);
    }

    /** 催单回复接口
     * @param $order_id
     * @param $remind_id
     * @param $reply_id
     * @param $reply_content
     * @return mixed
     * @throws \Exception
     * https://developer.waimai.meituan.com/home/docDetail/166
     */
    public function remindReply($order_id,$remind_id,$reply_id,$reply_content)
    {
        $params = array(
            'order_id'      =>$order_id,
            'remind_id'     =>$remind_id,
            'reply_id'      =>$reply_id,
            'reply_content' =>$reply_content,
        );
        return $this->call('order/remindReply',$params,self::METHOD_POST);
    }

    /** 商家确认已完成出餐
     * @param $order_id
     * @return mixed
     * @throws \Exception
     */
    public function preparationMealComplete($order_id)
    {
        $params = array(
            'order_id'      =>$order_id,
        );
        return $this->call('order/preparationMealComplete',$params);
    }

    /** 拉取用户真实手机号（必接）
     * @param $app_poi_code
     * @param $offset
     * @param $limit
     * @return mixed
     * @throws \Exception
     * https://developer.waimai.meituan.com/home/docDetail/221
     */
    public function batchPullPhoneNumber($app_poi_code,$offset,$limit)
    {
        $params = array(
            'app_poi_code' =>$app_poi_code,
            'offset'       =>$offset,
            'limit'        =>$limit,
        );
        return $this->call('order/batchPullPhoneNumber',$params,self::METHOD_POST);
    }
}