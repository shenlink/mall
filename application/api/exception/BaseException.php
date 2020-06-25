<?php

namespace app\api\exception;

use think\Exception;

/*
 * @Description:自定义的异常类基类
 * @Author: shenlink
 * @Date: 2020-06-24 22:18:29
 * @LastEditors: shenlink
 * @LastEditTime: 2020-06-25 10:32:55
 */

class BaseException extends Exception
{
    // http状态码
    public $code = 400;

    // 错误具体信息
    public $msg = 'invalid parameters';
    
    // 自定义错误码
    public $errorCode = 999;

    // 构造函数，传入一个数组
    public function __construct($params = [])
    {
        if (!is_array($params)) {
            return;
        }

        if (array_key_exists('code', $params)) {
            $this->code = $params['code'];
        }

        if (array_key_exists('msg', $params)) {
            $this->msg = $params['msg'];
        }

        if (array_key_exists('errorCode', $params)) {
            $this->errorCode = $params['errorCode'];
        }
    }

}
