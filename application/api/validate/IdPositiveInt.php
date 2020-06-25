<?php

namespace app\api\validate;

/*
 * @Description:IdPositiveInt验证id必须是正整数
 * @Author: shenlink
 * @Date: 2020-06-24 22:18:56
 * @LastEditors: shenlink
 * @LastEditTime: 2020-06-24 22:31:03
 */

class IdPositiveInt extends BaseValidate
{
    // 自定义规则
    protected $rule = [
        'id' => 'require|positiveInteger|isNotEmpty',
    ];

    // 提示信息
    protected $message = [
        'id.require' => 'id参数必须要传',
        'id.positiveInteger' => 'id参数必须是正整数',
        'id.isNotEmpty' => 'id不能为空',
    ];
}
