<?php


namespace Tbk\core;


class ContainerBase extends Container
{
    protected $provider = [];

    public $params = [];

    public $config = [
        'format' => 'json',
        'sign_method' => 'md5',
        'v' => '2.0',
        'sandbox' => false,
    ];

    public $base_url;

    public $app_key = '';

    public $app_secret = '';

    public $session = '';

    public $oauth_callback_url = '';

    public $state = '';

    public function __construct($params =array())
    {
        $this->config['timestamp'] = date('Y-m-d H:i:s', time());
//        $this->params = array_merge($this->config, $params);

        $provider_callback = function ($provider) {
            $obj = new $provider;
            $this->serviceRegister($obj);
        };
        //注册
        array_walk($this->provider, $provider_callback);
    }

    public function __get($id) {
        return $this->offsetGet($id);
    }

    /**
     * @param mixed $app_secret
     */
    public function setAppSecret($app_secret) {
        $this->app_secret = $app_secret;

    }

    /**
     * @param mixed $app_key
     */
    public function setAppKey($app_key) {
        $this->app_key = $app_key;
        $this->config['app_key'] = $app_key;
    }

    /**
     * @param string $oauth_callback_url
     */
    public function setOauthCallbackUrl($oauth_callback_url)
    {
        $this->oauth_callback_url = $oauth_callback_url;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @param string $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

}
