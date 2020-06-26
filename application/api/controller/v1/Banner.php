<?php
namespace app\api\controller\v1;

use app\api\model\Banner as BannerModel;
use app\api\validate\IdPositiveInt;

/*
 * @Description:Banner控制器
 * @Author: shenlink
 * @Date: 2020-06-24 22:46:53
 * @LastEditors: shenlink
 * @LastEditTime: 2020-06-26 11:59:56
 */

class Banner extends Base
{
    /**
     * @msg: 根据id获取banner信息
     * @param {type}
     * @method GET
     * @return:json
     * @url /banner/:id
     */
    public function getBanner($id)
    {
        // 调用验证器 验证id必须是正整数
        (new IdPositiveInt())->checkParams();

        // 查询数据
        $banner = BannerModel::getBannerById($id);

        //使用模型对象示例的hidden方法在局部进行隐藏指定的字段
        $banner = $banner->hidden(['id', 'update_time', 'items.delete_time']);

        return $banner;
    }
}
