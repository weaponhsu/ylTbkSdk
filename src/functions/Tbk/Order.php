<?php


namespace Tbk\functions\Tbk;


use Tbk\core\BaseClient;

class Order extends BaseClient
{
    /**
     * taobao.tbk.coupon.get
     * 淘宝客-推广者-所有订单查询
     * @return mixed
     * @throws \Tbk\exception\TbkException
     */
    public function couponGet() {
        $this->app->params['method'] = 'taobao.tbk.coupon.get';

        return $this->curlPost();
    }

}
