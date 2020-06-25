<?php

namespace app\api\exception;

/*
 * @Description:参数异常类
 * @Author: shenlink
 * @Date: 2020-06-24 22:18:29
 * @LastEditors: shenlink
 * @LastEditTime: 2020-06-24 22:24:30
 */

class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}
