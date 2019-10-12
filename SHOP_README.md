# 门店相关接品调用说明

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



```

### 结果示例

```
城市信息：
object(DadaOpenApi\Protocol\DadaResponse)#37 (4) {
  ["status"] => string(7) "success"
  ["code"] => int(0)
  ["msg"] => string(6) "成功"
  ["result"] => array(121) {
    [0] => array(2) {
      ["cityName"] => string(6) "上海"
      ["cityCode"] => string(3) "021"
    }
    [1] => array(2) {
      ["cityName"] => string(6) "北京"
      ["cityCode"] => string(3) "010"
    }
    [2] => array(2) {
      ["cityName"] => string(6) "合肥"
      ["cityCode"] => string(4) "0551"
    }
    [3] => array(2) {
      ["cityName"] => string(6) "南京"
      ["cityCode"] => string(3) "025"
    }
    [4] => array(2) {
      ["cityName"] => string(6) "苏州"
      ["cityCode"] => string(4) "0512"
    }
    [5] => array(2) {
      ["cityName"] => string(6) "武汉"
      ["cityCode"] => string(3) "027"
    }
    [6] => array(2) {
      ["cityName"] => string(6) "无锡"
      ["cityCode"] => string(4) "0510"
    }
    [7] => array(2) {
      ["cityName"] => string(6) "常州"
      ["cityCode"] => string(4) "0519"
    }
    [8] => array(2) {
      ["cityName"] => string(6) "杭州"
      ["cityCode"] => string(4) "0571"
    }
    [9] => array(2) {
      ["cityName"] => string(6) "广州"
      ["cityCode"] => string(3) "020"
    }
    [10] => array(2) {
      ["cityName"] => string(6) "深圳"
      ["cityCode"] => string(4) "0755"
    }
    [11] => array(2) {
      ["cityName"] => string(6) "重庆"
      ["cityCode"] => string(3) "023"
    }
    [12] => array(2) {
      ["cityName"] => string(6) "长沙"
      ["cityCode"] => string(4) "0731"
    }
    [13] => array(2) {
      ["cityName"] => string(6) "成都"
      ["cityCode"] => string(3) "028"
    }
    [14] => array(2) {
      ["cityName"] => string(6) "天津"
      ["cityCode"] => string(3) "022"
    }
    [15] => array(2) {
      ["cityName"] => string(6) "厦门"
      ["cityCode"] => string(4) "0592"
    }
    [16] => array(2) {
      ["cityName"] => string(6) "福州"
      ["cityCode"] => string(4) "0591"
    }
    [17] => array(2) {
      ["cityName"] => string(6) "大连"
      ["cityCode"] => string(4) "0411"
    }
    [18] => array(2) {
      ["cityName"] => string(6) "青岛"
      ["cityCode"] => string(4) "0532"
    }
    [19] => array(2) {
      ["cityName"] => string(9) "哈尔滨"
      ["cityCode"] => string(4) "0451"
    }
    [20] => array(2) {
      ["cityName"] => string(6) "济南"
      ["cityCode"] => string(4) "0531"
    }
    [21] => array(2) {
      ["cityName"] => string(6) "郑州"
      ["cityCode"] => string(4) "0371"
    }
    [22] => array(2) {
      ["cityName"] => string(6) "西安"
      ["cityCode"] => string(3) "029"
    }
    [23] => array(2) {
      ["cityName"] => string(6) "宁波"
      ["cityCode"] => string(4) "0574"
    }
    [24] => array(2) {
      ["cityName"] => string(6) "温州"
      ["cityCode"] => string(4) "0577"
    }
    [25] => array(2) {
      ["cityName"] => string(6) "芜湖"
      ["cityCode"] => string(4) "0553"
    }
    [26] => array(2) {
      ["cityName"] => string(6) "南通"
      ["cityCode"] => string(4) "0513"
    }
    [27] => array(2) {
      ["cityName"] => string(6) "南昌"
      ["cityCode"] => string(4) "0791"
    }
    [28] => array(2) {
      ["cityName"] => string(9) "石家庄"
      ["cityCode"] => string(4) "0311"
    }
    [29] => array(2) {
      ["cityName"] => string(6) "潍坊"
      ["cityCode"] => string(4) "0536"
    }
    [30] => array(2) {
      ["cityName"] => string(6) "嘉兴"
      ["cityCode"] => string(4) "0573"
    }
    [31] => array(2) {
      ["cityName"] => string(6) "金华"
      ["cityCode"] => string(4) "0579"
    }
    [32] => array(2) {
      ["cityName"] => string(6) "烟台"
      ["cityCode"] => string(4) "0535"
    }
    [33] => array(2) {
      ["cityName"] => string(6) "扬州"
      ["cityCode"] => string(4) "0514"
    }
    [34] => array(2) {
      ["cityName"] => string(6) "昆山"
      ["cityCode"] => string(4) "0512"
    }
    [35] => array(2) {
      ["cityName"] => string(6) "佛山"
      ["cityCode"] => string(4) "0757"
    }
    [36] => array(2) {
      ["cityName"] => string(6) "东莞"
      ["cityCode"] => string(4) "0769"
    }
    [37] => array(2) {
      ["cityName"] => string(9) "马鞍山"
      ["cityCode"] => string(4) "0555"
    }
    [38] => array(2) {
      ["cityName"] => string(6) "大理"
      ["cityCode"] => string(4) "0872"
    }
    [39] => array(2) {
      ["cityName"] => string(6) "亳州"
      ["cityCode"] => string(4) "0558"
    }
    [40] => array(2) {
      ["cityName"] => string(6) "湖州"
      ["cityCode"] => string(4) "0572"
    }
    [41] => array(2) {
      ["cityName"] => string(6) "六安"
      ["cityCode"] => string(4) "0564"
    }
    [42] => array(2) {
      ["cityName"] => string(6) "徐州"
      ["cityCode"] => string(4) "0516"
    }
    [43] => array(2) {
      ["cityName"] => string(6) "盐城"
      ["cityCode"] => string(4) "0515"
    }
    [44] => array(2) {
      ["cityName"] => string(6) "镇江"
      ["cityCode"] => string(4) "0511"
    }
    [45] => array(2) {
      ["cityName"] => string(6) "达州"
      ["cityCode"] => string(4) "0818"
    }
    [46] => array(2) {
      ["cityName"] => string(6) "德阳"
      ["cityCode"] => string(4) "0838"
    }
    [47] => array(2) {
      ["cityName"] => string(6) "广元"
      ["cityCode"] => string(4) "0839"
    }
    [48] => array(2) {
      ["cityName"] => string(6) "贵阳"
      ["cityCode"] => string(4) "0851"
    }
    [49] => array(2) {
      ["cityName"] => string(6) "昆明"
      ["cityCode"] => string(4) "0871"
    }
    [50] => array(2) {
      ["cityName"] => string(6) "乐山"
      ["cityCode"] => string(4) "0833"
    }
    [51] => array(2) {
      ["cityName"] => string(6) "泸州"
      ["cityCode"] => string(4) "0830"
    }
    [52] => array(2) {
      ["cityName"] => string(6) "眉山"
      ["cityCode"] => string(4) "1833"
    }
    [53] => array(2) {
      ["cityName"] => string(6) "绵阳"
      ["cityCode"] => string(4) "0816"
    }
    [54] => array(2) {
      ["cityName"] => string(6) "南充"
      ["cityCode"] => string(4) "0817"
    }
    [55] => array(2) {
      ["cityName"] => string(9) "攀枝花"
      ["cityCode"] => string(4) "0812"
    }
    [56] => array(2) {
      ["cityName"] => string(6) "曲靖"
      ["cityCode"] => string(4) "0874"
    }
    [57] => array(2) {
      ["cityName"] => string(6) "宜宾"
      ["cityCode"] => string(4) "0831"
    }
    [58] => array(2) {
      ["cityName"] => string(6) "自贡"
      ["cityCode"] => string(4) "0813"
    }
    [59] => array(2) {
      ["cityName"] => string(6) "遵义"
      ["cityCode"] => string(4) "0852"
    }
    [60] => array(2) {
      ["cityName"] => string(6) "楚雄"
      ["cityCode"] => string(4) "0878"
    }
    [61] => array(2) {
      ["cityName"] => string(6) "广汉"
      ["cityCode"] => string(3) "028"
    }
    [62] => array(2) {
      ["cityName"] => string(9) "张家口"
      ["cityCode"] => string(4) "0313"
    }
    [63] => array(2) {
      ["cityName"] => string(6) "泰安"
      ["cityCode"] => string(4) "0538"
    }
    [64] => array(2) {
      ["cityName"] => string(6) "河源"
      ["cityCode"] => string(4) "0762"
    }
    [65] => array(2) {
      ["cityName"] => string(6) "汕头"
      ["cityCode"] => string(4) "0754"
    }
    [66] => array(2) {
      ["cityName"] => string(6) "茂名"
      ["cityCode"] => string(4) "0668"
    }
    [67] => array(2) {
      ["cityName"] => string(6) "韶关"
      ["cityCode"] => string(4) "0751"
    }
    [68] => array(2) {
      ["cityName"] => string(6) "太原"
      ["cityCode"] => string(4) "0351"
    }
    [69] => array(2) {
      ["cityName"] => string(6) "惠州"
      ["cityCode"] => string(4) "0752"
    }
    [70] => array(2) {
      ["cityName"] => string(6) "湛江"
      ["cityCode"] => string(4) "0759"
    }
    [71] => array(2) {
      ["cityName"] => string(6) "南宁"
      ["cityCode"] => string(4) "0771"
    }
    [72] => array(2) {
      ["cityName"] => string(6) "清远"
      ["cityCode"] => string(4) "0763"
    }
    [73] => array(2) {
      ["cityName"] => string(6) "莆田"
      ["cityCode"] => string(4) "0594"
    }
    [74] => array(2) {
      ["cityName"] => string(6) "中山"
      ["cityCode"] => string(4) "0760"
    }
    [75] => array(2) {
      ["cityName"] => string(6) "漳州"
      ["cityCode"] => string(4) "0596"
    }
    [76] => array(2) {
      ["cityName"] => string(6) "揭阳"
      ["cityCode"] => string(4) "0663"
    }
    [77] => array(2) {
      ["cityName"] => string(6) "桂林"
      ["cityCode"] => string(4) "0773"
    }
    [78] => array(2) {
      ["cityName"] => string(6) "阳江"
      ["cityCode"] => string(4) "0662"
    }
    [79] => array(2) {
      ["cityName"] => string(6) "保定"
      ["cityCode"] => string(4) "0312"
    }
    [80] => array(2) {
      ["cityName"] => string(6) "柳州"
      ["cityCode"] => string(4) "0772"
    }
    [81] => array(2) {
      ["cityName"] => string(6) "珠海"
      ["cityCode"] => string(4) "0756"
    }
    [82] => array(2) {
      ["cityName"] => string(6) "沈阳"
      ["cityCode"] => string(3) "024"
    }
    [83] => array(2) {
      ["cityName"] => string(6) "泉州"
      ["cityCode"] => string(4) "0595"
    }
    [84] => array(2) {
      ["cityName"] => string(6) "邯郸"
      ["cityCode"] => string(4) "0310"
    }
    [85] => array(2) {
      ["cityName"] => string(6) "肇庆"
      ["cityCode"] => string(4) "0758"
    }
    [86] => array(2) {
      ["cityName"] => string(6) "长春"
      ["cityCode"] => string(4) "0431"
    }
    [87] => array(2) {
      ["cityName"] => string(6) "邢台"
      ["cityCode"] => string(4) "0319"
    }
    [88] => array(2) {
      ["cityName"] => string(6) "廊坊"
      ["cityCode"] => string(4) "0316"
    }
    [89] => array(2) {
      ["cityName"] => string(6) "宁德"
      ["cityCode"] => string(4) "0593"
    }
    [90] => array(2) {
      ["cityName"] => string(6) "襄阳"
      ["cityCode"] => string(4) "0710"
    }
    [91] => array(2) {
      ["cityName"] => string(6) "宜昌"
      ["cityCode"] => string(4) "0717"
    }
    [92] => array(2) {
      ["cityName"] => string(6) "新乡"
      ["cityCode"] => string(4) "0373"
    }
    [93] => array(2) {
      ["cityName"] => string(6) "株洲"
      ["cityCode"] => string(4) "0733"
    }
    [94] => array(2) {
      ["cityName"] => string(6) "岳阳"
      ["cityCode"] => string(4) "0730"
    }
    [95] => array(2) {
      ["cityName"] => string(6) "赣州"
      ["cityCode"] => string(4) "0797"
    }
    [96] => array(2) {
      ["cityName"] => string(6) "晋中"
      ["cityCode"] => string(4) "0354"
    }
    [97] => array(2) {
      ["cityName"] => string(6) "大同"
      ["cityCode"] => string(4) "0352"
    }
    [98] => array(2) {
      ["cityName"] => string(6) "安阳"
      ["cityCode"] => string(4) "0372"
    }
    [99] => array(2) {
      ["cityName"] => string(6) "郴州"
      ["cityCode"] => string(4) "0735"
    }
    [100] => array(2) {
      ["cityName"] => string(6) "抚州"
      ["cityCode"] => string(4) "0794"
    }
    [101] => array(2) {
      ["cityName"] => string(6) "黄石"
      ["cityCode"] => string(4) "0714"
    }
    [102] => array(2) {
      ["cityName"] => string(6) "吉安"
      ["cityCode"] => string(4) "0796"
    }
    [103] => array(2) {
      ["cityName"] => string(9) "景德镇"
      ["cityCode"] => string(4) "0798"
    }
    [104] => array(2) {
      ["cityName"] => string(6) "九江"
      ["cityCode"] => string(4) "0792"
    }
    [105] => array(2) {
      ["cityName"] => string(6) "开封"
      ["cityCode"] => string(4) "0378"
    }
    [106] => array(2) {
      ["cityName"] => string(6) "娄底"
      ["cityCode"] => string(4) "0738"
    }
    [107] => array(2) {
      ["cityName"] => string(6) "萍乡"
      ["cityCode"] => string(4) "0799"
    }
    [108] => array(2) {
      ["cityName"] => string(6) "邵阳"
      ["cityCode"] => string(4) "0739"
    }
    [109] => array(2) {
      ["cityName"] => string(6) "湘潭"
      ["cityCode"] => string(4) "0732"
    }
    [110] => array(2) {
      ["cityName"] => string(6) "新余"
      ["cityCode"] => string(4) "0790"
    }
    [111] => array(2) {
      ["cityName"] => string(6) "益阳"
      ["cityCode"] => string(4) "0737"
    }
    [112] => array(2) {
      ["cityName"] => string(6) "常熟"
      ["cityCode"] => string(4) "0512"
    }
    [113] => array(2) {
      ["cityName"] => string(6) "太仓"
      ["cityCode"] => string(4) "0512"
    }
    [114] => array(2) {
      ["cityName"] => string(6) "临安"
      ["cityCode"] => string(4) "0571"
    }
    [115] => array(2) {
      ["cityName"] => string(6) "辛集"
      ["cityCode"] => string(4) "0311"
    }
    [116] => array(2) {
      ["cityName"] => string(6) "江阴"
      ["cityCode"] => string(4) "0510"
    }
    [117] => array(2) {
      ["cityName"] => string(6) "胶州"
      ["cityCode"] => string(4) "0532"
    }
    [118] => array(2) {
      ["cityName"] => string(6) "彭州"
      ["cityCode"] => string(3) "028"
    }
    [119] => array(2) {
      ["cityName"] => string(6) "晋江"
      ["cityCode"] => string(4) "0595"
    }
    [120] => array(2) {
      ["cityName"] => string(6) "清镇"
      ["cityCode"] => string(4) "0851"
    }
  }
}
注册商户：
object(DadaOpenApi\Protocol\DadaResponse)#38 (4) {
  ["status"] => string(4) "fail"
  ["code"] => int(9924)
  ["msg"] => string(18) "手机号不正确"
  ["result"] => NULL
}
新增门店：
object(DadaOpenApi\Protocol\DadaResponse)#37 (4) {
  ["status"] => string(4) "fail"
  ["code"] => int(2419)
  ["msg"] => string(70) "body参数json解析出错,请检查body内的参数类型是否正确"
  ["result"] => NULL
}
更新门店：
object(DadaOpenApi\Protocol\DadaResponse)#38 (4) {
  ["status"] => string(4) "fail"
  ["code"] => int(2420)
  ["msg"] => string(40) "QA环境禁止修改11047059门店编号"
  ["result"] => NULL
}
门店详情：
object(DadaOpenApi\Protocol\DadaResponse)#36 (4) {
  ["status"] => string(7) "success"
  ["code"] => int(0)
  ["msg"] => string(6) "成功"
  ["result"] => array(12) {
    ["station_name"] => string(12) "测试门店"
    ["area_name"] => string(12) "浦东新区"
    ["station_address"] => string(21) "上海市隆宇大厦"
    ["city_name"] => string(6) "上海"
    ["contact_name"] => string(6) "阿花"
    ["origin_shop_id"] => string(8) "11047059"
    ["business"] => int(1)
    ["lng"] => float(121.515559)
    ["phone"] => string(11) "15811112222"
    ["id_card"] => string(18) "123456789123456789"
    ["lat"] => float(31.230238)
    ["status"] => int(1)
  }
}

```
