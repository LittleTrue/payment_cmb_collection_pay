<?php
/**
 * This file is part of DEZHI.
 *
 * @department : Commercial development.
 * @description : This file is part of [purchase].
 * DEZHI all rights reserved.
 */
namespace Collection\cmbCollectionClient\WeChatPay;

use Collection\cmbCollectionClient\Application;
use Collection\cmbCollectionClient\Base\BaseClient;
use Collection\cmbCollectionClient\Base\Exceptions\ClientError;

/**
 * 合单支付 -- 微信支付请求客户端.
 */
class Client extends BaseClient
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

    /**
     * 发起微信统一支付下单.
     * @param  $payInfo 支付信息
     * @throws ClientError
     */
    public function unifiedOrderSubmit(array $payInfo)
    {
        $this->setUri('/weixinPay/order');

        $this->setParams($payInfo);

        return $request = $this->httpPostJson();
    }

    /**
     * 微信支付退款申请.
     * @return string
     */
    public function orderRefund(array $payInfo)
    {
        $this->setUri('/weixinPay/refund');

        $this->setParams($payInfo);

        return $request = $this->httpPostJson();
    }
}
