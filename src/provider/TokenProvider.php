<?php


namespace Tbk\provider;


use Tbk\core\Container;
use Tbk\functions\Auth\Token;
use Tbk\interfaces\Provider;

class TokenProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        // TODO: Implement serviceProvider() method.
        $container['token'] = function ($container) {
            return new Token($container);
        };
    }
}
