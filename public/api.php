<?php
/*
 * @Author: shenlink
 * @Date: 2020-06-24 21:01:27
 * @LastEditors: shenlink
 * @LastEditTime: 2020-06-25 10:18:56
 */

// [ api入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
// 绑定模块
define('BIND_MODULE','api');
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';