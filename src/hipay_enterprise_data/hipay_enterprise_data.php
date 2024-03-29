<?php
/**
 * HiPay Enterprise Data
 *
 * 2017 HiPay
 *
 * NOTICE OF LICENSE
 *
 * @author    HiPay <support.tpp@hipay.com>
 * @copyright 2017 HiPay
 * @license   https://github.com/hipay/hipay-enterprise-sdk-prestashop-data/blob/master/LICENSE.md
 */

if (!defined('_PS_VERSION_')) {
    exit;
}
/**
 * Hipay_enterprise_data
 *
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2017 - HiPay
 * @license     https://github.com/hipay/hipay-enterprise-sdk-prestashop-data/blob/master/LICENSE.md
 * @link    https://github.com/hipay/hipay-enterprise-sdk-prestashop-data
 */
class Hipay_enterprise_data extends Module
{
    public function __construct()
    {

        $this->name = 'hipay_enterprise_data';
        $this->tab = 'payment';
        $this->version = '1.0.0';
        $this->author = 'HiPay';

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);

        $this->bootstrap = true;
        $this->dependencies = array('hipay_enterprise');

        parent::__construct();

        $this->displayName = $this->l('HiPay Enterprise Data');
        $this->description = $this->l('Add your own data to DSP2 check made by HiPay Payment Module!');

    }

    public function install()
    {
        return parent::install() && $this->registerHook('actionHipayApiRequest');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookActionHipayApiRequest($params){
        $orderRequest = $params['OrderRequest'];
        $cart = $params['Cart'];

        //$orderRequest->example = 'example';
    }

}
