<?php
/**
 * Created by PhpStorm.
 * User: yangchangdong
 * Date: 2019/10/12
 * Time: 11:20 AM
 */

namespace DadaOpenApi\Model;

/**
 * Class BalanceModel
 * @package DadaOpenApi\Model
 * 余额
 */
class BalanceModel
{
    public $category;

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }


}