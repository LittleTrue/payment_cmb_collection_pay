<?php
/**
 * This file is part of DEZHI.
 *
 * @department : Commercial development.
 * @description : This file is part of [purchase].
 * DEZHI all rights reserved.
 */
namespace Collection\cmbCollectionService;

use Collection\cmbCollectionClient\Application;
use Collection\cmbCollectionClient\Base\Exceptions\ClientError;
use Collection\cmbCollectionClient\Order\Client;

/**
 * 合单支付 -- 微信支付服务
 */
class WeChatPayService
{
    /**
     * @var Client
     */
    private $wechatPayClient;

    public function __construct(Application $app)
    {
        $this->wechatPayClient = $app['wechat_pay'];
    }

    /**
     * 发起微信统一支付下单.
     * @param  $payInfo 支付信息
     * @throws ClientError
     */
    public function unifiedOrderSubmit(array $payInfo)
    {
        if (empty($payInfo)) {
            throw new ClientError('请求参数丢失。');
        }

        return $this->wechatPayClient->unifiedOrderSubmit($payInfo);
    }

    /**
     * 微信支付退款申请.
     * @throws ClientError
     */
    public function orderRefund(array $payInfo)
    {
        if (empty($payInfo)) {
            throw new ClientError('请求参数丢失。');
        }

        return $this->wechatPayClient->orderRefund($payInfo);
    }
}
