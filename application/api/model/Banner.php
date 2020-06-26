<?php

namespace app\api\model;

use app\api\validate\ValueNotNull;

/*
 * @Description:Banner模型
 * @Author: shenlink
 * @Date: 2020-06-24 22:49:26
 * @LastEditors: shenlink
 * @LastEditTime: 2020-06-26 11:53:23
 */

class Banner extends Base
{
    // 隐藏字段
    protected $hidden = ['update_time', 'delete_time'];
}
