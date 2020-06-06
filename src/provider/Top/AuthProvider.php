<?php


namespace Tbk\provider\Top;


use Tbk\core\Container;
use Tbk\functions\Top\Auth;
use Tbk\interfaces\Provider;

class AuthProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        // TODO: Implement serviceProvider() method.
        $container['auth_token'] = function ($container) {
            return new Auth($container);
        };
    }
}
