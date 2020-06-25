<?php

namespace app\api\validate;

use app\api\exception\NullException;

/*
 * @Description:验证模型返回的数据是否为空
 * @Author: shenlink
 * @Date: 2020-06-24 22:18:56
 * @LastEditors: shenlink
 * @LastEditTime: 2020-06-24 22:30:02
 */

class ValueNotNull extends BaseValidate
{
    /**
     * @msg: 判断查询的返回值是否为空，为空则抛出异常
     * @param {type}
     * @return: mixed
     */
    public static function checkMiss($data)
    {
        if (!$data) {

            throw new NullException();
        }
    }
}
