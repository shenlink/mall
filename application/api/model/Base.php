<?php

namespace app\api\model;

use think\Model;

/*
 * @Description:模型基类
 * @Author: shenlink
 * @Date: 2020-06-24 23:29:40
 * @LastEditors: shenlink
 * @LastEditTime: 2020-06-26 11:45:47
 */

class Base extends Model
{
    /**
     * @msg:获取image的路径前缀
     * @param {type}
     * @return:
     */
    protected function prefixImgUrl($value, $data)
    {
        //获取自定义配置文件
        $img_prefix = config('setting.img_prefix');

        // from字段如果是1 说明是本地图片资源，需要对图片路径处理一下； from是2就是网络图片资源，直接返回地址即可
        return $data['from'] == 1 ? $img_prefix . $value : $value;
        // return $img_prefix.$value;
    }
}
