<?php
/**
 * This file is part of DEZHI.
 *
 * @department : Commercial development.
 * @description : This file is part of [purchase].
 * DEZHI all rights reserved.
 */
namespace Collection\cmbCollectionClient;

use Collection\cmbCollectionClient\Base\Config;
use Pimple\Container;

/**
 * Class Application.
 */
class Application extends Container
{
    /**
     * @var array
     */
    protected $providers = [
        Base\ServiceProvider::class,
        WeChatPay\ServiceProvider::class,
        BarcodePay\ServiceProvider::class,
        ScanPay\ServiceProvider::class,
        AliPay\ServiceProvider::class,
    ];

    /**
     * Application constructor.
     */
    public function __construct(array $config = [])
    {
        parent::__construct();

        $this['config'] = function () use ($config) {
            return new Config($config);
        };

        $this->registerProviders();
    }

    /**
     * @param $id
     */
    public function __get($id)
    {
        return $this->offsetGet($id);
    }

    /**
     * Register providers.
     */
    protected function registerProviders()
    {
        foreach ($this->providers as $provider) {
            $this->register(new $provider());
        }
    }
}
