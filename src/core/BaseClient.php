<?php


namespace Tbk\core;

use Tbk\exception\TbkException;


class BaseClient
{
    protected $app;

    public $base_url = 'https://eco.taobao.com/router/rest';

    public $url_info;

    protected $postData;

    public $res_url;

    public $mode = 'production';

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function sign() {
        $code_arr = array_merge($this->app->config, $this->app->params);
        $code_arr['session'] = $this->app->session;
        unset($code_arr['sandbox']);


        $this->postData = $code_arr;
        if ($this->app->config['sign_method'] == 'md5') {
            ksort($this->postData);
            $original_string = $this->app->app_secret;
            foreach ($this->postData as $k => $v) {
                if (!is_array($v) && "@" != substr($v, 0, 1)) {
                    $original_string .= "$k$v";
                }
            }
            unset($k, $v);
            $original_string .= $this->app->app_secret;
            $this->postData['sign'] = strtoupper(md5($original_string));
        }
    }

    public function setMode($mode = '') {
        if (!empty($mode))
            $this->mode = $mode;
    }

    /**
     * get 请求方式
     * @return mixed
     * @throws TbkException
     */
    public function curlGet(){
        $this->sign();
        $file =  $this->curlRequest($this->res_url,'','GET');
        return json_decode($file,true);
    }

    /**
     * post 请求方式
     * @return mixed
     * @throws TbkException
     */
    public function curlPost(){
        $this->sign();
        $result = $this->curlRequest($this->base_url, $this->postData,'POST');

        $resp = json_decode($result, true);
        if ($this->app->config['sandbox'] === true)
            var_dump($resp);

        var_dump($resp);

        if (isset($resp['error_response'])) {
            $code = isset($resp['error_response']['sub_code']) ? $resp['error_response']['sub_code'] : $resp['error_response']['code'];
            $msg = isset($resp['error_response']['sub_msg']) ? $resp['error_response']['sub_msg'] : $resp['error_response']['msg'];
            throw new TbkException($msg, is_numeric($code) ? $code : TbkException::INVALID_PARAM_NO);
        }

        return current($resp);
    }

    /**
     * 设置地址
     * @param $api_name
     * @return BaseClient
     */
    public function setApi($api_name){
        $this->url_info = $api_name;
        return $this;
    }

    /**
     * curl 请求
     * @param $base_url
     * @param $query_data
     * @param string $method
     * @param bool $ssl
     * @param int $exe_timeout
     * @param int $conn_timeout
     * @param int $dns_timeout
     * @return bool|string
     */
    public function curlRequest($base_url, $query_data, $method = 'get', $ssl = true, $exe_timeout = 10, $conn_timeout = 10, $dns_timeout = 3600)
    {

        $ch = curl_init();

        if ($method == 'get') {
            //method get
            if ( !empty($query_data) && is_array($query_data)){
                $connect_symbol = strpos($base_url, '?') !== false ? '&' : '?';
                foreach($query_data as $key => $val) {
                    if ( is_array($val) ) {
                        $val = serialize($val);
                    }
                    $base_url .= $connect_symbol . $key . '=' . rawurlencode($val);
                    $connect_symbol = '&';
                }
            }
        } else {
            if ( !empty($query_data) && is_array($query_data)){
                foreach($query_data as $key => $val) {
                    if($key=='imageData'){
                        if (file_exists($val)) {
                            $query_data[$key] = new \CURLFile($val);
                        }
                    }
                    if (is_array($val)) {
                        $query_data[$key] = serialize($val);
                    }
                }
            }
            //method post
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $query_data);
        }
        curl_setopt($ch, CURLOPT_URL, $base_url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $conn_timeout);
        curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, $dns_timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $exe_timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        // 关闭ssl验证
        if($ssl){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }

        $output = curl_exec($ch);

        if ($output === false)
            $output = '';

        curl_close($ch);
        return $output;
    }

}
