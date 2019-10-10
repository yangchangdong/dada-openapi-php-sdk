<?php

namespace MtOpenApi\Api;


class ProductService extends RequestService
{
    /**
     * 获取分类
     * @doc http://mss.sankuai.com/v1/mss_mt_tenant_2230562/static/doc/doc.html#4.9
     * @param $name
     * @param $pid
     * @return mixed
     */
    public function get_category($shop_id)
    {
        $params = array(
            'app_poi_code'=>$shop_id
        );
        return $this->call('foodCat/list',$params,self::METHOD_GET);
    }

    /**
     * 创建商品分类
     * @doc http://mss.sankuai.com/v1/mss_mt_tenant_2230562/static/doc/doc.html#4.1
     * @param $name
     * @param $pid
     * @return mixed
     */
    public function create_category($shop_id,$name,$old_name,$sort)
    {
        $params = array(
            'app_poi_code'=>$shop_id,
            'category_name_origin'=>$old_name,
            'category_name'=>$name,
            'sequence'=>$sort
        );
        return $this->call('foodCat/update',$params,self::METHOD_POST);
    }

    /**
     * 修改商品分类
     * @doc http://mss.sankuai.com/v1/mss_mt_tenant_2230562/static/doc/doc.html#4.1
     * @param $id
     * @param $name
     * @return mixed
     */
    public function update_category($shop_id,$name,$old_name,$sort)
    {
        $params = array(
            'app_poi_code'=>$shop_id,
            'category_name_origin'=>$old_name,
            'category_name'=>$name,
            'sequence'=>$sort
        );
        return $this->call('foodCat/update',$params,self::METHOD_POST);
    }



    /**
     * 创建商品
     * @doc http://mss.sankuai.com/v1/mss_mt_tenant_2230562/static/doc/doc.html#4.4
     * @param $params
     * @return mixed
     */
    public function create_product($params)
    {
        return $this->call('food/save',$params,self::METHOD_POST);
    }

    /**
     * 修改商品
     * @doc http://mss.sankuai.com/v1/mss_mt_tenant_2230562/static/doc/doc.html#4.4
     * @param $params
     * @return mixed
     */
    public function update_product($params)
    {
        return $this->call('food/save',$params,self::METHOD_POST);
    }

    /**
     * @param $shop_id
     * @param $app_food_code
     * @return mixed
     * @throws \Exception
     * food/get 查询菜品详情 https://waimaiopen.meituan.com/api/v1/food/get
     */
    public function get_product_detail($shop_id,$app_food_code)
    {
        $params = array(
            'app_poi_code'=>$shop_id,
            'app_food_code'=>$app_food_code,
        );
        return $this->call('food/get',$params,self::METHOD_GET);
    }

    /**
     * @param $shop_id
     * @param int $offset
     * @param int $limit
     * @return mixed
     * @throws \Exception
     * food/list 查询门店菜品列表
     */
    public function get_product_list($shop_id,$offset=1,$limit=10)
    {
       $params = array(
           'app_poi_code'=>$shop_id,
           'offset'=>$offset,
           'limit'=>$limit,
       );
        return $this->call('food/list',$params,self::METHOD_GET);
    }
    

    /**
     * 绑定商品属性
     * @doc http://mss.sankuai.com/v1/mss_mt_tenant_2230562/static/doc/doc.html#4.16
     * @param $shop_id
     * @param $property
     * @return mixed
     */
    public function bind_property($shop_id,$property)
    {
        $params = array(
            'app_poi_code'=>$shop_id,
            'food_property'=>$property
        );
        return $this->call('food/bind/property',$params,self::METHOD_POST);
    }

    /**
     * 删除商品
     * @doc http://mss.sankuai.com/v1/mss_mt_tenant_2230562/static/doc/doc.html#4.5
     * @param $shop_id
     * @param $product_id
     * @return mixed
     */
    public function delete_product($shop_id,$product_id)
    {
        $params = [
            'app_poi_code'=>$shop_id,
            'app_food_code'=>$product_id,
        ];
        return $this->call('food/delete',$params,self::METHOD_POST);
    }

    /**
     *
     * 批量更新售卖状态(上下架)
     * @doc http://mss.sankuai.com/v1/mss_mt_tenant_2230562/static/doc/doc.html#4.19
     * @param $shop_id
     * @param $food_data [{"app_food_code": "abcd135","skus":[{"sku_id":"abcd135"}] },{...}]
     * @param $status   0上架1下架
     * @return mixed
     * @throws \Exception
     */
    public function batch_product_shelf($shop_id,$food_data,$status)
    {
        $params = array(
            'app_poi_code'=>$shop_id,
            'food_data'=>$food_data,
            'sell_status'=>$status,
        );
        return $this->call('food/sku/sellStatus',$params,self::METHOD_POST);
    }


    /**
     * 批量更新商品库存
     * @doc http://mss.sankuai.com/v1/mss_mt_tenant_2230562/static/doc/doc.html#4.13
     * @param $shop_id
     * @param $food_data
     * @return mixed
     */
    public function batch_product_stock($shop_id,$food_data)
    {
        $params = array(
            'app_poi_code'=>$shop_id,
            'food_data'=>$food_data,
        );
        return $this->call('food/sku/stock',$params,self::METHOD_POST);
    }

    /**
     * 上传图片
     * @doc http://mss.sankuai.com/v1/mss_mt_tenant_2230562/static/doc/doc.html#13
     * @param $shop_id
     * @param $list
     * @return mixed
     */
    public function image_upload($shop_id,$img_url)
    {
        $params = array(
            'app_poi_code'=>$shop_id,
            'img_data'=>"@$img_url",
            'img_name'=>basename($img_url),
        );
        return $this->call('image/upload',$params,self::METHOD_POST);
    }

    /**
     * 根据商品名称和规格名称更换新的商品编码
     * @param $shop_id 三方门店IDapp_poi_code
     * @param $product_name
     * @param $category_name
     * @param $spec
     * @param $app_food_code
     * @param $sku_id
     * @return mixed
     * @throws \Exception
     * food/updateAppFoodCodeByNameAndSpec 根据商品名称和规格名称更换新的商品编码
     * https://waimaiopen.meituan.com/api/v1/food/updateAppFoodCodeByNameAndSpec
     */

    public function update_app_food_code_by_name_and_spec($shop_id,$product_name,$category_name,$spec,$app_food_code,$sku_id)
    {
        $params = array(
            'app_poi_code'  =>$shop_id,
            'name'          =>$product_name,
            'category_name' =>$category_name,
            'spec'          =>$spec,
            'app_food_code' =>$app_food_code,
            'sku_id'        =>$sku_id,
        );
        return $this->call('food/updateAppFoodCodeByNameAndSpec',$params,self::METHOD_POST);
    }

}