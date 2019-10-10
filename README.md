# PHP SDK 接入指南

## 接入指南

  1. PHP version >= 5.4 & curl extension support
  2. 通过composer安装SDK
  3. 可台在Config配置类，中配置key和Secret。也可以初始化时重新设置
  4. 使用sdk提供的接口进行开发调试
  5. 一些新的功能待开发中


### 安装

```
php 安装方法
composer require yangchangdong/dada-openapi-php-sdk dev-master

```

### 基本用法

```
php thinkphp 使用方法
    /**
     * @author yangchangdong
     * Date 2019/10/10
     */
    namespace app\index\controller;
    
    use DadaOpenApi\Api\OrderAddApi;
    use DadaOpenApi\Config\Config;
    use DadaOpenApi\Model\OrderModel;
    use DadaOpenApi\Protocol\DadaRequestClient;
    
    class Dada
    {
    
        public function index()
        {
            $config = new Config(0,false);
            $config->setAppKey('*****');
            $config->setAppSecret('****');
    
            $orderModel = new OrderModel();
            $orderModel->setShopNo('11047059');	            // 第三方门店编号
            $orderModel->setOriginId('123456789123');		// 第三方订单号
            $orderModel->setCityCode('CN11');				// 城市code(可以参照城市code接口)
            $orderModel->setCargoPrice(10);
            $orderModel->setIsPrepay(0);
            $orderModel->setReceiverName('张三');
            $orderModel->setReceiverAddress('北京市大兴区');
            $orderModel->setReceiverLat(39.917581);
            $orderModel->setReceiverLng(116.529304);
            $orderModel->setReceiverPhone('13800138000');
            $orderModel->setCallback('local.dada.com/index.php/index/dada/callback');
            $addOrderApi = new OrderAddApi(json_encode($orderModel));
    
            $dada_client = new DadaRequestClient($config, $addOrderApi);
            $resp = $dada_client->makeRequest();
            dump($resp);
            echo json_encode($resp);
        }
    
        public function callback()
        {
            return json(['message'=>'ok']);
        }
    }
```

### 测试信息
````
object(DadaOpenApi\Protocol\DadaResponse)#38 (4) {
  ["status"] => string(4) "fail"
  ["code"] => int(2105)
  ["msg"] => string(50) "订单已下发,如要重发,请使用重发接口"
  ["result"] => NULL
}
{"status":"fail","code":2105,"msg":"\u8ba2\u5355\u5df2\u4e0b\u53d1,\u5982\u8981\u91cd\u53d1,\u8bf7\u4f7f\u7528\u91cd\u53d1\u63a5\u53e3","result":null}

````

### 感谢
```$xslt
由达达提供的初始代码，在其上进行了一些二次开发，使用能够直接在thinkphp laravel 中直接使用。
并且能够通过setAppKey设置不同的AppKey和AppSecret
```

### 变更记录
```$xslt
1、使用命名空间
2、。。。。。。。。。

```