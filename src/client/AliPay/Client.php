<?php
/**
 * This file is part of DEZHI.
 *
 * @department : Commercial development.
 * @description : This file is part of [purchase].
 * DEZHI all rights reserved.
 */
namespace Collection\cmbCollectionClient\AliPay;

use Collection\cmbCollectionClient\Application;
use Collection\cmbCollectionClient\Base\BaseClient;

/**
 * 合单支付 -- 支付宝请求客户端.
 */
class Client extends BaseClient
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

    /**
     * 发起合单支付通用付款码支付.
     * @return string
     */
    public function nativeOrderSubmit(array $payInfo)
    {
        $this->setUri('/aliPay/nativeOrder');

        $this->setParams($payInfo);

        return $request = $this->httpPostJson();
    }

    /**
     * 支付宝服务窗支付.
     * @return string
     */
    public function windowsOrderSubmit(array $payInfo)
    {
        $this->setUri('/aliPay/order');

        $this->setParams($payInfo);

        return $request = $this->httpPostJson();
    }

    /**
     * 支付宝支付退款申请.
     * @return string
     */
    public function orderRefund(array $payInfo)
    {
        $this->setUri('/aliPay/refund');

        $this->setParams($payInfo);

        return $request = $this->httpPostJson();
    }
}
