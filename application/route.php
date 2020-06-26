<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

/*
 * @Description:路由
 * @Author: shenlink
 * @Date: 2020-06-24 20:52:56
 * @LastEditors: shenlink
 * @LastEditTime: 2020-06-26 09:34:59
 */

use think\Route;

Route::get('api/:version/banner/:id', 'api/:version.Banner/getBanner');
