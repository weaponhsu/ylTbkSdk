<?php


namespace Tbk\provider\Openuid;


use Tbk\core\Container;
use Tbk\functions\Openuid\Order;
use Tbk\interfaces\Provider;

class OrderProvider implements Provider
{

    public function serviceProvider(Container $container)
    {
        // TODO: Implement serviceProvider() method.
        $container['open_uid_order'] = function ($container) {
            return new Order($container);
        };
    }
}
