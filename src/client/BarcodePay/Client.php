<?php
/**
 * This file is part of DEZHI.
 *
 * @department : Commercial development.
 * @description : This file is part of [purchase].
 * DEZHI all rights reserved.
 */
namespace Collection\cmbCollectionClient\BarcodePay;

use Collection\cmbCollectionClient\Application;
use Collection\cmbCollectionClient\Base\BaseClient;

/**
 * 合单支付 -- 付款码收款请求客户端.
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
     * 付款码收款支付结果查询.
     * @return string
     */
    public function orderQuery(array $payInfo)
    {
        $this->setUri('/sweptPay/orderStatusQuery');

        $this->setParams($payInfo);

        return $request = $this->httpPostJson();
    }
}
