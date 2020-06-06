<?php


namespace Tbk\provider\Tbk;


use Tbk\core\Container;
use Tbk\functions\Tbk\Coupon;
use Tbk\interfaces\Provider;

class CouponProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        // TODO: Implement serviceProvider() method.
        $container['tbk_order'] = function ($container) {
            return new Coupon($container);
        };
    }
}
