<?php


namespace Tbk\provider\Tbk;


use Tbk\core\Container;
use Tbk\functions\Tbk\Shop;
use Tbk\interfaces\Provider;

class ShopProvider implements Provider
{

    public function serviceProvider(Container $container)
    {
        // TODO: Implement serviceProvider() method.
        $container['tbk_shop'] = function ($container) {
            return new Shop($container);
        };
    }
}
