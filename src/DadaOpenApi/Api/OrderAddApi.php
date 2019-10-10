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
class OrderAddApi extends BaseApi {
    /**
     * AddOrderApi constructor.
     * @param $params
     *
     */
    public function __construct($params) {
        parent::__construct(UrlConfig::ORDER_ADD_URL, $params);
    }
}
