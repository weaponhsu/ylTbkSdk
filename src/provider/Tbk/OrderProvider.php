<?php


namespace Tbk\provider\Tbk;


use Tbk\core\Container;
use Tbk\functions\Tbk\Order;
use Tbk\interfaces\Provider;

class OrderProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        // TODO: Implement serviceProvider() method.
        $container['tbk_order'] = function ($container) {
            return new Order($container);
        };
    }
}
