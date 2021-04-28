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
 * 合单支付 -- 收款码收款服务
 */
class ScanPayService
{
    /**
     * @var Client
     */
    private $scanPayClient;

    public function __construct(Application $app)
    {
        $this->scanPayClient = $app['scan_pay'];
    }

    /**
     * 通用场景 收款码支付.
     * @throws ClientError
     */
    public function scanPaySubmit(array $payInfo)
    {
        if (empty($payInfo)) {
            throw new ClientError('请求参数丢失。');
        }

        return $this->scanPayClient->scanPaySubmit($payInfo);
    }

    /**
     * 收款码收款退款申请.
     * @throws ClientError
     */
    public function scanRefund(array $payInfo)
    {
        if (empty($payInfo)) {
            throw new ClientError('请求参数丢失。');
        }

        return $this->scanPayClient->scanRefund($payInfo);
    }

    /**
     * 收款码收款支付结果查询.
     * @throws ClientError
     */
    public function orderQuery(array $payInfo)
    {
        if (empty($payInfo)) {
            throw new ClientError('请求参数丢失。');
        }

        return $this->scanPayClient->orderQuery($payInfo);
    }
}
