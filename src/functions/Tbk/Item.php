<?php


namespace Tbk\functions\Tbk;


use Tbk\core\BaseClient;

class Item extends BaseClient
{
    /**
     * taobao.tbk.item.info.get
     * 淘宝客-公用-淘宝客商品详情查询(简版)
     * @return mixed
     * @throws \Tbk\exception\TbkException
     */
    public function infoGet() {
        $this->app->params['method'] = 'taobao.tbk.item.info.get';

        return $this->curlPost();
    }

    /**
     * taobao.tbk.item.click.extract
     * 淘宝客-公用-链接解析出商品id
     * @return mixed
     * @throws \Tbk\exception\TbkException
     */
    public function clickExtract() {
        $this->app->params['method'] = 'taobao.tbk.item.click.extract';

        return $this->curlPost();
    }

}
