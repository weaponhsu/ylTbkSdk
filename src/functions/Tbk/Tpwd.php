<?php


namespace Tbk\functions\Tbk;


use Tbk\core\BaseClient;

class Tpwd extends BaseClient
{
    /**
     * taobao.tbk.tpwd.create
     * 淘宝客-公用-淘口令生成
     * @return mixed
     * @throws \Tbk\exception\TbkException
     */
    public function create() {
        $this->app->params['method'] = 'taobao.tbk.tpwd.create';

        return $this->curlPost();
    }

}
