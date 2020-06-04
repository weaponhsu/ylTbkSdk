<?php


namespace Tbk\functions\Tbk;


use Tbk\core\BaseClient;

class Shop extends BaseClient
{
    /**
     * taobao.tbk.shop.get
     * 淘宝客-推广者-店铺搜索
     * @return mixed
     * @throws \Tbk\exception\TbkException
     */
    public function get() {
        $this->app->params['method'] = 'taobao.tbk.shop.get';
        return $this->curlPost();
    }

    /**
     * taobao.tbk.shop.recommend.get
     * 淘宝客-公用-店铺关联推荐
     * @return mixed
     * @throws \Tbk\exception\TbkException
     */
    public function recommendGet() {
        $this->app->params['method'] = 'taobao.tbk.shop.recommend.get';
        return $this->curlPost();
    }

}
