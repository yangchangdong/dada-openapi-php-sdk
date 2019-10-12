<?php
/**
 * Created by PhpStorm.
 * User: yangchangdong
 * Date: 2019/10/12
 * Time: 10:05 AM
 */

namespace DadaOpenApi\Model;


class MerchantModel
{
    public $mobile ;
    public $city_name ;
    public $enterprise_name ;
    public $enterprise_address ;
    public $contact_name ;
    public $contact_phone ;
    public $email ;

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getCityName()
    {
        return $this->city_name;
    }

    /**
     * @param mixed $city_name
     */
    public function setCityName($city_name)
    {
        $this->city_name = $city_name;
    }

    /**
     * @return mixed
     */
    public function getEnterpriseName()
    {
        return $this->enterprise_name;
    }

    /**
     * @param mixed $enterprise_name
     */
    public function setEnterpriseName($enterprise_name)
    {
        $this->enterprise_name = $enterprise_name;
    }

    /**
     * @return mixed
     */
    public function getEnterpriseAddress()
    {
        return $this->enterprise_address;
    }

    /**
     * @param mixed $enterprise_address
     */
    public function setEnterpriseAddress($enterprise_address)
    {
        $this->enterprise_address = $enterprise_address;
    }

    /**
     * @return mixed
     */
    public function getContactName()
    {
        return $this->contact_name;
    }

    /**
     * @param mixed $contact_name
     */
    public function setContactName($contact_name)
    {
        $this->contact_name = $contact_name;
    }

    /**
     * @return mixed
     */
    public function getContactPhone()
    {
        return $this->contact_phone;
    }

    /**
     * @param mixed $contact_phone
     */
    public function setContactPhone($contact_phone)
    {
        $this->contact_phone = $contact_phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }


}