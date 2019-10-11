# 订单相关接品调用说明

## 代码示例


```
<?php
/**
 * @author yangchangdong
 * Date 2019/10/10
 */
namespace app\index\controller;

use DadaOpenApi\Api\OrderAddApi;
use DadaOpenApi\Api\OrderApi;
use DadaOpenApi\Config\Config;
use DadaOpenApi\Model\ExistAppointModel;
use DadaOpenApi\Model\FormalCancelOrderModel;
use DadaOpenApi\Model\OrderModel;
use DadaOpenApi\Model\TipModel;
use DadaOpenApi\Protocol\DadaRequestClient;

class Dada
{
    public $config;

    public function __construct()
    {
        if(!$this->config){
            $this->config = new Config(0,false);
            $this->config->setAppKey('dada7b640a17f68cfce');
            $this->config->setAppSecret('8342b99d691198a42f9c52f06f4d365e');
        }
    }

    public function index()
    {
        $this->addOrder();
        $this->reAddOrder();
        $this->addTip();
        $this->queryOrderStatus();
        $this->reasonsCancel();
        $this->formalCancel();
        $this->transporterAppointList();//先查询
        $this->existAppoint();
        $this->cancelAppoint();

        $this->reasonsComplaint();
        $this->dadaComplaint();

        $this->goodsConfirm();


    }

    /**
     *
     * 新增订单
     */
    public function addOrder()
    {
        echo "<hr />新增订单：";
        $orderModel = new OrderModel();
        $orderModel->setShopNo('11047059');	    // 第三方门店编号
        $orderModel->setOriginId('123456789123');			// 第三方订单号
        $orderModel->setCityCode('CN11');						// 城市code(可以参照城市code接口)
        $orderModel->setCargoPrice(10);
        $orderModel->setIsPrepay(0);
        $orderModel->setReceiverName('张三');
        $orderModel->setReceiverAddress('北京市大兴区');
        $orderModel->setReceiverLat(39.917581);
        $orderModel->setReceiverLng(116.529304);
        $orderModel->setReceiverPhone('13800138000');
        $orderModel->setCallback('local.dada.com/index.php/index/dada/callback');

        //$addOrderApi = new OrderAddApi(json_encode($orderModel));
        $orderApi = new OrderApi();
        $orderApi->reAddOrder(json_encode($orderModel));

        $dada_client = new DadaRequestClient($this->config, $orderApi);
        $resp = $dada_client->makeRequest();
        dump($resp);
    }

    /**
     *
     * 订单重发
     */
    public function reAddOrder()
    {
        echo "<hr />订单重发：";
        $orderModel = new OrderModel();
        $orderModel->setShopNo('11047059');	    // 第三方门店编号
        $orderModel->setOriginId('123456789123');			// 第三方订单号
        $orderModel->setCityCode('CN11');						// 城市code(可以参照城市code接口)
        $orderModel->setCargoPrice(10);
        $orderModel->setIsPrepay(0);
        $orderModel->setReceiverName('张三');
        $orderModel->setReceiverAddress('北京市大兴区');
        $orderModel->setReceiverLat(39.917581);
        $orderModel->setReceiverLng(116.529304);
        $orderModel->setReceiverPhone('13800138000');
        $orderModel->setCallback('local.dada.com/index.php/index/dada/callback');

        //$addOrderApi = new OrderAddApi(json_encode($orderModel));
        $orderApi = new OrderApi();
        $orderApi->addOrder(json_encode($orderModel));


        $dada_client = new DadaRequestClient($this->config, $orderApi);
        $resp = $dada_client->makeRequest();
        dump($resp);
    }

    /**
     * 添加小费
     */
    public function addTip()
    {
        echo "<hr />添加小费：";
        $tipModel = new TipModel();
        $tipModel->setOrderId('123456789123');
        $tipModel->setTips(1.1);
        $tipModel->setCityCode('CN10');
        $tipModel->setInfo('这是一个小费的测试');
        dump($tipModel);
        echo json_encode($tipModel);

        $orderApi = new OrderApi();
        $orderApi->addTip(json_encode($tipModel));

        $dada_client = new DadaRequestClient($this->config, $orderApi);

        $resp = $dada_client->makeRequest();
        dump($resp);
    }

    /**
     * 查询订单详情
     */
    public function queryOrderStatus()
    {

        echo "<hr />查询订单详情：";
        $qureyOrderStatusApi = new OrderApi();
        $params = json_encode(['order_id'=>'123456789123']);
        echo $params;
        $qureyOrderStatusApi->queryOrderStatus($params);
        $dada_client = new DadaRequestClient($this->config, $qureyOrderStatusApi);
        $resp = $dada_client->makeRequest();
        dump($resp);
    }

    /**
     *
     * 订单取消
     */
    public function formalCancel()
    {
        echo "<hr />订单取消：";
        $formalCancelOrderModel = new FormalCancelOrderModel();
        $formalCancelOrderModel->setOrderId('123456789123');			// 第三方订单号
        $formalCancelOrderModel->setCancelReasonId(1);
        $formalCancelOrderModel->setCancelReason('这是一个测试的取消原因');

        $orderApi = new OrderApi();
        $orderApi->formalCancel(json_encode($formalCancelOrderModel));


        $dada_client = new DadaRequestClient($this->config, $orderApi);
        $resp = $dada_client->makeRequest();
        dump($resp);
    }

    /**
     * 获取订单取消原因
     */
    public function reasonsCancel()
    {
        echo "<hr />获取订单取消原因：";
        $orderApi = new OrderApi();
        $orderApi->reasonsCancel(json_encode([]));
        $dada_client = new DadaRequestClient($this->config, $orderApi);
        $resp = $dada_client->makeRequest();
        dump($resp);
    }

    /**
     * 追加订单
     * 商户调用该接口将已发布的订单追加给指定的配送员,接口URL地址：/api/order/appoint/exist
     */
    public function existAppoint()
    {
        echo "<hr />追加订单：";
        $existAppointModel = new ExistAppointModel();
        $existAppointModel->setOrderId('123456789123');// 第三方订单号
        $existAppointModel->setShopNo('11047059');
        $existAppointModel->setTransporterId(666);

        $orderApi = new OrderApi();
        $orderApi->existAppoint(json_encode($existAppointModel));

        $dada_client = new DadaRequestClient($this->config, $orderApi);
        $resp = $dada_client->makeRequest();
        dump($resp);
    }

    /**
     * 取消追加订单
     *
     */
    public function cancelAppoint()
    {
        echo "<hr />取消追加订单：";
        $orderApi = new OrderApi();
        $params = json_encode(['order_id'=>'123456789123']);
        echo $params;
        $orderApi->cancelAppoint($params);
        $dada_client = new DadaRequestClient($this->config, $orderApi);
        $resp = $dada_client->makeRequest();
        dump($resp);
    }

    /**
     *查询追加配送员
     *
     */
    public function transporterAppointList()
    {
        echo "<hr />查询追加配送员：";
        $orderApi = new OrderApi();
        $params = json_encode(['shop_no'=>'11047059']);
        echo $params;
        $orderApi->transporterAppointList($params);
        $dada_client = new DadaRequestClient($this->config, $orderApi);
        $resp = $dada_client->makeRequest();
        dump($resp);
    }

    /**
     *
     * 商家投诉达达
     */
    public function dadaComplaint()
    {
        echo "<hr />商家投诉达达：";
        $existAppointModel = new ExistAppointModel();
        $existAppointModel->setOrderId('123456789123');// 第三方订单号
        $existAppointModel->setShopNo('11047059');
        $existAppointModel->setTransporterId(2);

        $orderApi = new OrderApi();
        $orderApi->existAppoint(json_encode($existAppointModel));

        $dada_client = new DadaRequestClient($this->config, $orderApi);
        $resp = $dada_client->makeRequest();
        dump($resp);
    }

    /**
     * 获取商家投诉达达原因
     */
    public function reasonsComplaint()
    {
        echo "<hr />获取商家投诉达达原因：";
        $orderApi = new OrderApi();
        $orderApi->reasonsComplaint(json_encode([]));

        $dada_client = new DadaRequestClient($this->config, $orderApi);
        $resp = $dada_client->makeRequest();
        dump($resp);
    }

    /**
     * 妥投异常之物品返回完成
     */
    public function goodsConfirm()
    {
        echo "<hr />获取商家投诉达达原因：";
        $orderApi = new OrderApi();
        $orderApi->goodsConfirm(json_encode(['order_id'=>'123456789123']));

        $dada_client = new DadaRequestClient($this->config, $orderApi);
        $resp = $dada_client->makeRequest();
        dump($resp);
    }




    /**
     * @return \think\response\Json
     * 回调地址
     */
    public function callback()
    {
        return json(['message'=>'ok']);
    }
}


```

### 结果示例

```
新增订单：
object(DadaOpenApi\Protocol\DadaResponse)#38 (4) {
  ["status"] => string(4) "fail"
  ["code"] => int(2061)
  ["msg"] => string(74) "订单未终结(已取消、已过期、投递异常的订单才能重发)"
  ["result"] => NULL
}
订单重发：
object(DadaOpenApi\Protocol\DadaResponse)#35 (4) {
  ["status"] => string(4) "fail"
  ["code"] => int(2105)
  ["msg"] => string(50) "订单已下发,如要重发,请使用重发接口"
  ["result"] => NULL
}
添加小费：
object(DadaOpenApi\Model\TipModel)#35 (4) {
  ["order_id"] => string(12) "123456789123"
  ["tips"] => float(1.1)
  ["city_code"] => string(4) "CN10"
  ["info"] => string(27) "这是一个小费的测试"
}
{"order_id":"123456789123","tips":1.1,"city_code":"CN10","info":"\u8fd9\u662f\u4e00\u4e2a\u5c0f\u8d39\u7684\u6d4b\u8bd5"}
object(DadaOpenApi\Protocol\DadaResponse)#38 (4) {
  ["status"] => string(4) "fail"
  ["code"] => int(2059)
  ["msg"] => string(45) "只有在待接单的情况下才能加小费"
  ["result"] => NULL
}
查询订单详情：{"order_id":"123456789123"}
object(DadaOpenApi\Protocol\DadaResponse)#36 (4) {
  ["status"] => string(7) "success"
  ["code"] => int(0)
  ["msg"] => string(6) "成功"
  ["result"] => array(23) {
    ["orderId"] => string(12) "123456789123"
    ["statusCode"] => int(8)
    ["statusMsg"] => string(9) "指派单"
    ["transporterName"] => string(0) ""
    ["transporterPhone"] => string(0) ""
    ["transporterLng"] => string(0) ""
    ["transporterLat"] => string(0) ""
    ["deliveryFee"] => float(12)
    ["tips"] => float(1.1)
    ["distance"] => int(1065585)
    ["receiptUrl"] => string(0) ""
    ["createTime"] => string(19) "2019-10-11 11:51:32"
    ["fetchTime"] => string(0) ""
    ["finishTime"] => string(0) ""
    ["cancelTime"] => string(19) "2019-10-11 12:27:54"
    ["orderFinishCode"] => string(1) "0"
    ["actualFee"] => float(12)
    ["insuranceFee"] => float(0)
    ["supplierName"] => string(12) "测试门店"
    ["supplierAddress"] => string(21) "上海市隆宇大厦"
    ["supplierPhone"] => string(11) "13162209976"
    ["supplierLat"] => string(9) "31.230238"
    ["supplierLng"] => string(10) "121.515559"
  }
}
获取订单取消原因：
object(DadaOpenApi\Protocol\DadaResponse)#38 (4) {
  ["status"] => string(7) "success"
  ["code"] => int(0)
  ["msg"] => string(6) "成功"
  ["result"] => array(10) {
    [0] => array(2) {
      ["reason"] => string(21) "没有配送员接单"
      ["id"] => int(1)
    }
    [1] => array(2) {
      ["reason"] => string(21) "配送员没来取货"
      ["id"] => int(2)
    }
    [2] => array(2) {
      ["reason"] => string(21) "配送员态度太差"
      ["id"] => int(3)
    }
    [3] => array(2) {
      ["reason"] => string(18) "顾客取消订单"
      ["id"] => int(4)
    }
    [4] => array(2) {
      ["reason"] => string(18) "订单填写错误"
      ["id"] => int(5)
    }
    [5] => array(2) {
      ["reason"] => string(27) "配送员让我取消此单"
      ["id"] => int(34)
    }
    [6] => array(2) {
      ["reason"] => string(27) "配送员不愿上门取货"
      ["id"] => int(35)
    }
    [7] => array(2) {
      ["reason"] => string(21) "我不需要配送了"
      ["id"] => int(36)
    }
    [8] => array(2) {
      ["reason"] => string(48) "配送员以各种理由表示无法完成订单"
      ["id"] => int(37)
    }
    [9] => array(2) {
      ["reason"] => string(6) "其他"
      ["id"] => int(10000)
    }
  }
}
订单取消：
object(DadaOpenApi\Protocol\DadaResponse)#35 (4) {
  ["status"] => string(7) "success"
  ["code"] => int(0)
  ["msg"] => string(6) "成功"
  ["result"] => array(1) {
    ["deduct_fee"] => float(0)
  }
}
查询追加配送员：{"shop_no":"11047059"}
object(DadaOpenApi\Protocol\DadaResponse)#37 (4) {
  ["status"] => string(7) "success"
  ["code"] => int(0)
  ["msg"] => string(6) "成功"
  ["result"] => array(1) {
    [0] => array(4) {
      ["phone"] => string(11) "13546670420"
      ["name"] => string(12) "达达骑手"
      ["id"] => int(666)
      ["city_id"] => int(1)
    }
  }
}
追加订单：
object(DadaOpenApi\Protocol\DadaResponse)#38 (4) {
  ["status"] => string(7) "success"
  ["code"] => int(0)
  ["msg"] => string(6) "成功"
  ["result"] => NULL
}
取消追加订单：{"order_id":"123456789123"}
object(DadaOpenApi\Protocol\DadaResponse)#36 (4) {
  ["status"] => string(7) "success"
  ["code"] => int(0)
  ["msg"] => string(6) "成功"
  ["result"] => NULL
}
获取商家投诉达达原因：
object(DadaOpenApi\Protocol\DadaResponse)#38 (4) {
  ["status"] => string(7) "success"
  ["code"] => int(0)
  ["msg"] => string(6) "成功"
  ["result"] => array(20) {
    [0] => array(2) {
      ["reason"] => string(18) "达达态度恶劣"
      ["id"] => int(1)
    }
    [1] => array(2) {
      ["reason"] => string(18) "接单后未取货"
      ["id"] => int(2)
    }
    [2] => array(2) {
      ["reason"] => string(18) "取货速度太慢"
      ["id"] => int(3)
    }
    [3] => array(2) {
      ["reason"] => string(18) "送货速度太慢"
      ["id"] => int(4)
    }
    [4] => array(2) {
      ["reason"] => string(15) "货品未送达"
      ["id"] => int(5)
    }
    [5] => array(2) {
      ["reason"] => string(12) "货品损坏"
      ["id"] => int(6)
    }
    [6] => array(2) {
      ["reason"] => string(24) "违规收取顾客小费"
      ["id"] => int(7)
    }
    [7] => array(2) {
      ["reason"] => string(18) "达达衣冠不整"
      ["id"] => int(11)
    }
    [8] => array(2) {
      ["reason"] => string(24) "达达恶意取消订单"
      ["id"] => int(69)
    }
    [9] => array(2) {
      ["reason"] => string(31) "达达提前点击取货/送达"
      ["id"] => int(71)
    }
    [10] => array(2) {
      ["reason"] => string(24) "达达无标准保温箱"
      ["id"] => int(214)
    }
    [11] => array(2) {
      ["reason"] => string(21) "无法联系上骑士"
      ["id"] => int(251)
    }
    [12] => array(2) {
      ["reason"] => string(24) "虚假发起妥投失败"
      ["id"] => int(40004)
    }
    [13] => array(2) {
      ["reason"] => string(18) "骑士肇事逃逸"
      ["id"] => int(50020)
    }
    [14] => array(2) {
      ["reason"] => string(18) "骑士偷窃物品"
      ["id"] => int(50021)
    }
    [15] => array(2) {
      ["reason"] => string(18) "骑士肇事逃逸"
      ["id"] => int(50209)
    }
    [16] => array(2) {
      ["reason"] => string(18) "骑士偷窃物品"
      ["id"] => int(50210)
    }
    [17] => array(2) {
      ["reason"] => string(25) "骑士拒绝取货/配送"
      ["id"] => int(50244)
    }
    [18] => array(2) {
      ["reason"] => string(24) "骑士私自取消订单"
      ["id"] => int(50245)
    }
    [19] => array(2) {
      ["reason"] => string(19) "骑士骚扰/殴打"
      ["id"] => int(50246)
    }
  }
}
商家投诉达达：
object(DadaOpenApi\Protocol\DadaResponse)#37 (4) {
  ["status"] => string(7) "success"
  ["code"] => int(0)
  ["msg"] => string(6) "成功"
  ["result"] => NULL
}
获取商家投诉达达原因：
object(DadaOpenApi\Protocol\DadaResponse)#35 (4) {
  ["status"] => string(7) "success"
  ["code"] => int(0)
  ["msg"] => string(6) "成功"
  ["result"] => NULL
}

```
