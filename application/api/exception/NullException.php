<?php

namespace app\api\exception;

/*
 * @Descripttion: NullException空值异常类
 * @Author: shenlink
 * @Date: 2020-06-22 13:55:09
 * @LastEditor: shenlink
 * @LastEditTime: 2020-06-25 10:35:11
 */

class NullException extends BaseException
{
   public $code = 400;
   public $msg = '请求的资源不存在';
   public $errorCode = 10000;

}
