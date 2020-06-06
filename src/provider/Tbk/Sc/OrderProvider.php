<?php


namespace Tbk\provider\Tbk\Sc;


use Tbk\core\Container;
use Tbk\functions\Tbk\Sc\Order;
use Tbk\interfaces\Provider;

class OrderProvider implements Provider
{

    public function serviceProvider(Container $container)
    {
        $container['sc_order'] = function ($container) {
            return new Order($container);
        };
    }
}
