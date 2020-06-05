<?php


namespace Tbk\provider;


use Tbk\core\Container;
use Tbk\functions\Taobao\Order;
use Tbk\interfaces\Provider;

class TaobaoProvider implements Provider
{

    public function serviceProvider(Container $container)
    {
        // TODO: Implement serviceProvider() method.
        $container['taobao_order'] = function ($container) {
            return new Order($container);
        };
    }
}
