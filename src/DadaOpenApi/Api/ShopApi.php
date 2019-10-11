<?php
/**
 * 添加门店api
 * @author yangchangdong
 * Date 2019/10/10
 */

namespace DadaOpenApi\Api;

use DadaOpenApi\Config\UrlConfig;

class ShopApi extends BaseApi{
    
    public function __construct($params) {
        parent::__construct(UrlConfig::SHOP_ADD_URL, $params);
    }
}
