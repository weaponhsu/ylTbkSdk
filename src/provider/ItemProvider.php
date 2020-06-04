<?php


namespace Tbk\provider;


use Tbk\core\Container;
use Tbk\functions\Tbk\Item;
use Tbk\interfaces\Provider;

class ItemProvider implements Provider
{

    public function serviceProvider(Container $container)
    {
        // TODO: Implement serviceProvider() method.
        $container['item'] = function ($container) {
            return new Item($container);
        };
    }
}
