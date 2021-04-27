<?php
/**
 * This file is part of DEZHI.
 *
 * @department : Commercial development.
 * @description : This file is part of [purchase].
 * DEZHI all rights reserved.
 */
namespace Collection\cmbCollectionClient\CombinePay;

use Collection\cmbCollectionClient\Application;
use Collection\cmbCollectionClient\Base\BaseClient;

/**
 * 合单支付 -- 通用支付请求客户端.
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
    public function barcodePaySubmit(array $payInfo)
    {
        $this->setUri('/sweptPay/order');

        $this->setParams($payInfo);

        return $request = $this->httpPostJson();
    }

    /**
     * 收款码申请支付.
     * @return string
     */
    public function scanPaySubmit(array $payInfo)
    {
        $this->setUri('/scanPay/order');

        $this->setParams($payInfo);

        return $request = $this->httpPostJson();
    }

    /**
     * 付款码收款退款申请.
     * @return string
     */
    public function barcodeRefund(array $payInfo)
    {
        $this->setUri('/sweptPay/refund');

        $this->setParams($payInfo);

        return $request = $this->httpPostJson();
    }

    /**
     * 收款码收款退款申请.
     * @return string
     */
    public function scanRefund(array $payInfo)
    {
        $this->setUri('/scanPay/refund');

        $this->setParams($payInfo);

        return $request = $this->httpPostJson();
    }
}
