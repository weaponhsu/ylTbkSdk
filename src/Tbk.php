<?php

namespace Tbk;

use Tbk\core\ContainerBase;
use Tbk\provider\ItemProvider;
use Tbk\provider\ShopProvider;
use Tbk\provider\TokenProvider;
use Tbk\provider\CouponProvider;
use Tbk\provider\TpwdProvider;

/**
 * Class Tbk
 * @package Tbk
 * @property TokenProvider auth
 * @property CouponProvider coupon
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
        TokenProvider::class,
        CouponProvider::class,
        ShopProvider::class,
        ItemProvider::class,
        TpwdProvider::class
    ];
}
