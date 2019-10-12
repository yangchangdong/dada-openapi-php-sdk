<?php
/**
 * 添加门店api
 * @author yangchangdong
 * Date 2019/10/10
 */

namespace DadaOpenApi\Api;

use DadaOpenApi\Config\UrlConfig;

class ShopApi extends BaseApi{
    
//    public function __construct($params) {
//        parent::__construct(UrlConfig::SHOP_ADD_URL, $params);
//    }

    public function __construct() {

    }

    /**
     * @param $params
     * 获取城市信息
     * 通过接口，获取城市信息列表。
     * 接口调用URL地址：/api/cityCode/list。
     */
    public function listCityCode($params)
    {
        $this->setUrl('/api/cityCode/list');
        $this->setBusinessParams($params);
    }

    /**
     * @param $params
     * 注册商户
     * 商户注册接口,并完成与该商户的绑定.生成的初始化密码会以短信形式发送给注册手机号
     * 接口URL地址：/merchantApi/merchant/add
     */
    public function addMerchant($params)
    {
        $this->setUrl('/merchantApi/merchant/add');
        $this->setBusinessParams($params);
    }

    /**
     * @param $params
     * 新增门店
     * 批量新增门店接口,接口URL地址：/api/shop/add
     * 1. 门店编码可自定义，但必须唯一，若不填写，则系统自动生成。发单时用于确认发单门店
        2. 如果需要使用达达商家App发单，请设置登陆达达商家App的账号（必须手机号）和密码
        3. 该接口为批量接口,业务参数为数组
     */
    public function addShop($params)
    {
        $this->setUrl('/api/shop/add');
        $this->setBusinessParams($params);
    }

    /**
     * @param $params
     * 编辑门店
     * 更新门店信息接口,接口URL地址：/api/shop/update
     * 门店编码是必传参数。其他参数，需要更新则传，且不能为空。
     */
    public function updateShop($params)
    {
        $this->setUrl('/api/shop/update');
        $this->setBusinessParams($params);
    }

    /**
     * @param $params
     * 门店详情
     * 查询门店详情接口,接口URL地址：/api/shop/detail
     * origin_shop_id
     */
    public function detailShop($params)
    {
        $this->setUrl('/api/shop/detail');
        $this->setBusinessParams($params);
    }


}
