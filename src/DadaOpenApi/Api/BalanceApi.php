<?php
/**
 * 添加门店api
 * @author yangchangdong
 * Date 2019/10/10
 */

namespace DadaOpenApi\Api;

use DadaOpenApi\Config\UrlConfig;

class BalanceApi extends BaseApi{
    
//    public function __construct($params) {
//        parent::__construct(UrlConfig::SHOP_ADD_URL, $params);
//    }

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
