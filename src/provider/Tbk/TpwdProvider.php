<?php


namespace Tbk\provider\Tbk;


use Tbk\core\Container;
use Tbk\functions\Tbk\Tpwd;
use Tbk\interfaces\Provider;

class TpwdProvider implements Provider
{

    public function serviceProvider(Container $container)
    {
        // TODO: Implement serviceProvider() method.
        $container['tbk_tpwd'] = function ($container) {
            return new Tpwd($container);
        };
    }
}
