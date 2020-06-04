<?php


namespace Tbk\provider;


use Tbk\core\Container;
use Tbk\functions\Tbk\Tpwd;
use Tbk\interfaces\Provider;

class TpwdProvider implements Provider
{

    public function serviceProvider(Container $container)
    {
        // TODO: Implement serviceProvider() method.
        $container['tpwd'] = function ($container) {
            return new Tpwd($container);
        };
    }
}
