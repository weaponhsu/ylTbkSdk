<?php


namespace Tbk\interfaces;


use Tbk\core\Container;

interface Provider
{
    public function serviceProvider(Container $container);

}
