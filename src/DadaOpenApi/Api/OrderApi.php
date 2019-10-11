<?php
/**
 * 发单api
 */
namespace DadaOpenApi\Api;

use DadaOpenApi\Config\UrlConfig;

/**
 * Class AddOrderApi
 * @package DadaOpenApi\Api
 * 新增订单
 */
class OrderApi extends BaseApi {
    /**
     * AddOrderApi constructor.
     * @param $params
     *
     */

    public function __construct() {
        //parent::__construct(UrlConfig::ORDER_ADD_URL, $params);
    }

    /**
     * @param $params
     * 新增订单 新增配送单接口
     */
    public function addOrder($params)
    {
        $this->setUrl(UrlConfig::ORDER_ADD_URL);
        $this->setBusinessParams($params);
    }

    /**
     * @param $params
     * 重新发布订单 在调用新增订单后，订单被取消、过期或者投递异常的情况下，调用此接口，可以在达达平台重新发布订单 接口调用URL地址：/api/order/reAddOrder。
     */
    public function reAddOrder($params)
    {
        $this->setUrl(UrlConfig::ORDER_RE_ADD_URL);
        $this->setBusinessParams($params);
    }
    

    /**
     * @param $params
     * 订单预发布
     * 1、查询订单运费接口，接口URL地址：/api/order/queryDeliverFee。
     */
    public function queryDeliverFee($params)
    {
        $this->setUrl('/api/order/queryDeliverFee');
        $this->setBusinessParams($params);
    }

    /**
     * @param $params
     * 订单预发布
     * 2、查询运费后发单接口，接口URL地址：/api/order/addAfterQuery。
     */
    public function addAfterQuery($params)
    {
        $this->setUrl('/api/order/addAfterQuery');
        $this->setBusinessParams($params);
    }

    /**
     * @param $params
     * 增加小费
     * 可以对待接单状态的订单增加小费。需要注意：订单的小费，以最新一次加小费动作的金额为准，故下一次增加小费额必须大于上一次小费额。
     * 接口调用URL地址：/api/order/addTip。
     */
    public function addTip($params)
    {
        $this->setUrl('/api/order/addTip');
        $this->setBusinessParams($params);
    }

    /**
     * @param $params
     * 订单详情查询
     * 查询订单的相关信息以及骑手的相关信息，具体信息参见参数说明。
     * 接口调用请求说明，URL地址：/api/order/status/query。
     */
    public function queryOrderStatus($params)
    {
        $this->setUrl('/api/order/status/query');
        $this->setBusinessParams($params);
    }


    /**
     * @param $params
     * 在订单待接单或待取货情况下，调用此接口可取消订单。注意：接单后1－15分钟内取消订单，运费退回。同时扣除2元作为给配送员的违约金
     * 接口调用请求说明，URL地址：/api/order/formalCancel
     */
    public function formalCancel($params)
    {
        $this->setUrl('/api/order/formalCancel');
        $this->setBusinessParams($params);
    }

    /**
     * @param $params
     * 获取取消原因
     * 调用取消订单接口时，需要传递取消原因ID，通过此接口获取订单取消理由列表
     * 接口调用请求说明，URL地址：/api/order/cancel/reasons。
     */
    public function reasonsCancel($params)
    {
        $this->setUrl('/api/order/cancel/reasons');
        $this->setBusinessParams($params);
    }

    /**
     * @param $params
     * 追加订单
     * 商户调用该接口将已发布的订单追加给指定的配送员,接口URL地址：/api/order/appoint/exist
     * 1. 追加的订单必须是该门店发出的处于待接单状态的订单
     * 2. 只能从符合条件的配送员列表选取配送员进行追加,参考查询追加配送员
     */
    public function existAppoint($params)
    {
        $this->setUrl('/api/order/appoint/exist');
        $this->setBusinessParams($params);
    }

    /**
     * @param $params
     * 取消追加订单
     * 商户调用该接口取消已发布的追加订单,接口URL地址：/api/order/appoint/cancel
     * 被取消的追加订单，状态变为待接单，其他配送员可见
     */
    public function cancelAppoint($params)
    {
        $this->setUrl('/api/order/appoint/cancel');
        $this->setBusinessParams($params);
    }

    /**
     * @param $params
     * 查询追加配送员
     * 商户调用该接口查询可追加订单的配送员列表,接口URL地址：/api/order/appoint/list/transporter
     * 可追加的配送员需符合以下条件:
        1. 配送员在1小时内接过此商户的订单,且订单未完成
        2. 配送员在当前商户接单数小于系统限定的指定商户接单总数
        3. 配送员在达达平台的接单数量未达上限
     */
    public function transporterAppointList($params)
    {
        $this->setUrl('/api/order/appoint/list/transporter');
        $this->setBusinessParams($params);
    }

    /**
     * @param $params
     * 商家投诉达达
     * 达达配送员接单后，商家如果对达达服务不满意，均可以使用该接口对达达进行投诉。
     * 接口调用请求说明，URL地址：/api/complaint/dada
     */
    public function dadaComplaint($params)
    {
        $this->setUrl('/api/complaint/dada');
        $this->setBusinessParams($params);
    }

    /**
     * @param $params
     * 获取商家投诉达达原因
     * 商家投诉达达，需要传递投诉原因ID，通过此接口获取投诉原因列表
     * 接口调用请求说明，URL地址：/api/complaint/reasons。
     */
    public function reasonsComplaint($params)
    {
        $this->setUrl('/api/complaint/reasons');
        $this->setBusinessParams($params);
    }

    /**
     * @param $params
     * 妥投异常之物品返回完成
     * 订单妥投异常后，订单状态变为9，骑士将物品进行返还，如果商家确认收到物品后，可以使用该 接口进行确认，订单状态变成10，同时订单终结。
     * 接口调用请求说明，URL地址：/api/order/confirm/goods。
     */
    public function goodsConfirm($params)
    {
        $this->setUrl('/api/order/confirm/goods');
        $this->setBusinessParams($params);
    }



}
