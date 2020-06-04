<?php


namespace Tbk\provider;


use Tbk\core\Container;
use Tbk\functions\Tbk\Coupon;
use Tbk\interfaces\Provider;

class CouponProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        // TODO: Implement serviceProvider() method.
        $container['coupon'] = function ($container) {
            return new Coupon($container);
        };
    }
}
