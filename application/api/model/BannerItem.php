<?php

namespace app\api\model;

use think\Model;

/*
 * @Description:
 * @Author: shenlink
 * @Date: 2020-06-25 11:14:10
 * @LastEditors: shenlink
 * @LastEditTime: 2020-06-26 11:42:27
 */

class BannerItem extends Model
{
    // 隐藏指定的字段
    protected $hidden = ['id', 'img_id', 'banner_id', 'update_time', 'delete_time'];

    // 关联Image模型
    public function image()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}
