<?php


namespace Tbk\functions\Openuid;


use Tbk\core\BaseClient;

class Order extends BaseClient
{
    /**
     * taobao.openuid.get.bytrade
     * 通过订单获取对应买家的openUID
     * @return mixed
     * @throws \Tbk\exception\TbkException
     */
    public function getTradeBy() {
        $this->app->params['method'] = 'taobao.openuid.get.bytrade';

        return $this->curlPost();
    }

}
