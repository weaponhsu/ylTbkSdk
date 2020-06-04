<?php


namespace Tbk\exception;

use Exception;

class TbkException extends Exception
{
    const INVALID_PARAM_NO = 400;

    const OAUTH_CALLBACK_URL_EMPTY = "授权登录callback地址不能为空";
    const OAUTH_STATE_EMPTY = "state不能为空";
    const OAUTH_LOGIN_CODE_EMPTY = "code不能为空";

}
