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
 * 合单支付 -- 通用服务
 */
class CombinePayService
{
    /**
     * @var Client
     */
    private $combinePayClient;

    public function __construct(Application $app)
    {
        $this->combinePayClient = $app['combine_pay'];
    }

    /**
     * 通用场景 付款码支付.
     * @throws ClientError
     */
    public function barcodePaySubmit(array $payInfo)
    {
        if (empty($payInfo)) {
            throw new ClientError('请求参数丢失。');
        }

        return $this->combinePayClient->barcodePaySubmit($payInfo);
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

        return $this->combinePayClient->scanPaySubmit($payInfo);
    }

    /**
     * 付款码收款退款申请.
     * @throws ClientError
     */
    public function barcodeRefund(array $payInfo)
    {
        if (empty($payInfo)) {
            throw new ClientError('请求参数丢失。');
        }

        return $this->combinePayClient->barcodeRefund($payInfo);
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

        return $this->combinePayClient->scanRefund($payInfo);
    }
}
