<?php

namespace app\api\model;

use app\api\validate\ValueNotNull;

/*
 * @Description:Banner模型
 * @Author: shenlink
 * @Date: 2020-06-24 22:49:26
 * @LastEditors: shenlink
 * @LastEditTime: 2020-06-26 11:43:15
 */

class Banner extends Base
{
    // 隐藏字段
    protected $hidden = ['update_time', 'delete_time'];

    /**
     * @msg: 关联BannerItem模型
     * @param {type}
     * @return:
     */
    public function bannerItem()
    {
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }

    /**
     * @msg:获取数据
     * @param {type}
     * @return:json
     */
    public static function getBannerById($id)
    {
        // 查询数据
        $banner = self::with(['bannerItem', 'bannerItem.image'])->find($id);

        // 如果记录不存在，抛出异常
        ValueNotNull::checkMiss($banner);

        return $banner;
    }
}
