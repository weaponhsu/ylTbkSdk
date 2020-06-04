<?php


namespace Tbk\functions\Tbk;


use Tbk\core\BaseClient;

class Coupon extends BaseClient
{
    /**
     * taobao.tbk.order.details.get
     * 淘宝客-推广者-所有订单查询
     * @return mixed
     * @throws \Tbk\exception\TbkException
     */
    public function get() {
        $this->app->params['method'] = 'taobao.tbk.coupon.get';

        return $this->curlPost();
    }

}
