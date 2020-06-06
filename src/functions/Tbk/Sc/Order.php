<?php


namespace Tbk\functions\Tbk\Sc;


use Tbk\core\BaseClient;

class Order extends BaseClient
{
    /**
     * taobao.tbk.sc.order.details.get
     * 淘宝客-服务商-所有订单查询
     * @return mixed
     * @throws \Tbk\exception\TbkException
     */
    public function detailGet() {
        $this->app->params['method'] = 'taobao.tbk.sc.order.details.get';

        return $this->curlPost();
    }

}
