<?php


namespace Tbk\functions\Auth;


use Tbk\core\BaseClient;
use Tbk\exception\TbkException;

class Token extends BaseClient
{
    /**
     * 登录
     * @return string
     * @throws TbkException
     */
    public function login() {
        if (empty($this->app->oauth_callback_url))
            throw new TbkException(TbkException::OAUTH_CALLBACK_URL_EMPTY, TbkException::INVALID_PARAM_NO);

        if (empty($this->app->state))
            throw new TbkException(TbkException::OAUTH_STATE_EMPTY, TbkException::INVALID_PARAM_NO);

        return 'https://oauth.taobao.com/authorize?response_type=code&client_id=30144205&redirect_uri=' . $this->oauth_callback_url . '&state=' . $this->state . '&view=web';
    }

    /**
     * 获取用户信息
     * @return mixed
     * @throws TbkException
     */
    public function getUserInfo() {
        if (! isset($this->app->params['code']) || empty($this->app->params['code']))
            throw new TbkException(TbkException::OAUTH_LOGIN_CODE_EMPTY, TbkException::INVALID_PARAM_NO);

        $this->app->base_url = 'https://oauth.taobao.com/token';
        $param = [
            'grant_type' => 'authorization_code',
            'client_id' => $this->app->app_key,
            'client_secret' => $this->app->app_secret,
            'redirect_uri' => $this->app->oauth_callback_url
        ];
        $this->app->param = array_merge($this->app->param, $param);

        return $this->curlPost();
    }

    /**
     * taobao.top.auth.token.refresh
     * 刷新Access Token
     * @return mixed
     * @throws TbkException
     */
    public function refreshToken() {
        $this->app->params['method'] = 'taobao.top.auth.token.refresh';

        return $this->curlPost();
    }

}