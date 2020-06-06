<?php


namespace Tbk\provider\Tbk;


use Tbk\core\Container;
use Tbk\functions\Tbk\Item;
use Tbk\interfaces\Provider;

class ItemProvider implements Provider
{

    public function serviceProvider(Container $container)
    {
        // TODO: Implement serviceProvider() method.
        $container['tbk_item'] = function ($container) {
            return new Item($container);
        };
    }
}
