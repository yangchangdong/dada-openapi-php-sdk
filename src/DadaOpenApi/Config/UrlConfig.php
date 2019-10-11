<?php
namespace DadaOpenApi\Config;
/**
 * Class UrlConfig
 * @package DadaOpenApi\Config
 * 接口地址
 */
class UrlConfig{
    const ORDER_ADD_URL = "/api/order/addOrder";//新增订单
    const ORDER_RE_ADD_URL = "/api/order/reAddOrder";//重发订单

    const SHOP_ADD_URL = "/api/shop/add";
    const CITY_ORDER_URL = "/api/cityCode/list";
}
