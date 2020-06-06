<?php

namespace Tbk;

use Tbk\core\ContainerBase;
use Tbk\provider\Tbk\CouponProvider;
use Tbk\provider\Tbk\Sc\OrderProvider as ScOrderProvider;
use Tbk\provider\Top\AuthProvider;
use Tbk\provider\Tbk\ItemProvider;
use Tbk\provider\Tbk\ShopProvider;
use Tbk\provider\Openuid\OrderProvider as OpenUidOrderProvider;
use Tbk\provider\Tbk\TpwdProvider;

/**
 * Class Tbk
 * @package Tbk
 */
class Tbk extends ContainerBase
{
    /**
     * 服务提供者
     * Tbk constructor.
     * @param array $params
     */
    public function __construct($params = array())
    {
        parent::__construct($params);
    }

    protected $provider = [
        // 服务提供者
        AuthProvider::class,
        ShopProvider::class,
        ItemProvider::class,
        TpwdProvider::class,
        CouponProvider::class,
        OpenUidOrderProvider::class,
        ScOrderProvider::class
    ];
}
