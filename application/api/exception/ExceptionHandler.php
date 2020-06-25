<?php

namespace app\api\exception;

//这里不能使用think\Exception;
use Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

/*
 * @Descripttion:
 *  全局异常处理类
自定义类需要继承Handle并且实现(重写)需要配置参数exception_handle

自定义的异常处理类需要在config.php配置参数exception_handle，才能生效

在render方法里面主要处理两类异常：一是客户端的异常(如客户传入参数错误、没有查询到客户要的数据，即空数据等)，客户端的异常通常不需要记录日志，但需要返回消息给客户端，二是服务器的异常，这类异不需要返回错误信息给客户端，但要记录下日志供开发者查看。
 * @Author: shenlink
 * @Date: 2020-06-24 22:18:29
 * @LastEditors: shenlink
 * @LastEditTime: 2020-06-25 10:40:41
 */

class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;

    /**
     * @msg:重写框架的Handle类的render方法
     * @param {$e}
     * @return:json
     */
    public function render(Exception $e)
    {
        if ($e instanceof BaseException) {
            // 第一类异常 客户端异常
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        } else {
            if (config('app_debug')) {
                // 如果是在开发环境下 就以默认的方式返回错误信息
                return parent::render($e);
            } else {
                // 在生产环境下 返回简洁的json错误信息给客户端
                // 第二类异常 服务端异常
                $this->code = 500;
                $this->msg = '服务器内部错误';
                $this->errorCode = 999;
                //记录服务端的错误日志
                $this->recordErrorLog($e);
            }
        }

        $request = Request::instance();

        $result = [
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
            'request_url' => $request->url(), //当前请求的url路径
        ];

        return json($result, $this->code);
    }

    /**
     * @msg:定义记录服务端错误日志方法
     * @param {$e}
     * @return:void
     */
    private function recordErrorLog(Exception $e)
    {
        // 日志初始化
        Log::init([
            // 日志类型
            'type' => 'File',
            // 日志的存储路径
            'path' => LOG_PATH,
            // 错误级别
            'level' => ['error'],
        ]);

        // 第一个参数是错误信息，第二个参数是错误级别
        Log::record($e->getMessage(), 'error');
    }
}
