# 余额相关接品调用说明

## 代码示例


```
<?php
/**
 * 添加门店api
 * @author yangchangdong
 * Date 2019/10/10
 */

namespace DadaOpenApi\Api;

use DadaOpenApi\Config\UrlConfig;

class BalanceApi extends BaseApi{

    public function __construct() {
    }

    /**
     * @param $params
     * 查询账户余额
     * 使用此接口可以查询运费账户或红包账户的余额。
     * 接口URL地址：/api/balance/query
     */
    public function queryBalance($params)
    {
        $this->setUrl('/api/balance/query');
        $this->setBusinessParams($params);
    }


}

```

### 结果示例

```
查询账户余额：
object(DadaOpenApi\Protocol\DadaResponse)#38 (4) {
  ["status"] => string(7) "success"
  ["code"] => int(0)
  ["msg"] => string(6) "成功"
  ["result"] => array(1) {
    ["deliverBalance"] => float(99999837030.83)
  }
}
```
