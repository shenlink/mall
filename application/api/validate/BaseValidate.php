<?php

namespace app\api\validate;

use think\Validate;
use app\api\exception\ParameterException;
use think\Request;

/*
 * @Description:验证器基类
 * @Author: shenlink
 * @Date: 2020-06-24 22:18:56
 * @LastEditors: shenlink
 * @LastEditTime: 2020-06-26 10:02:08
 */

class BaseValidate extends Validate
{
    /**
     * @msg: 批量验证参数
     * @param {type}
     * @return: mixed
     */
    public function checkParams()
    {
        // 获取http参数
        $params = Request::instance()->param();

        // $this就是validate对象 因为类继承了Validate
        $result = $this->batch()->check($params);

        if (!$result) {

            // 如果参数校验不通过 进行异常处理
            throw new ParameterException([
                'msg' => $this->error,
            ]);
        } else {

            return true;
        }
    }

    /**
     * @msg: 自定义验证规则 验证正整数
     * @param {type} mixed
     * @return: bool
     */
    protected function positiveInteger($value)
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {

            return true;
        } else {

            return false;
        }
    }

/**
     * @msg: 自定义验证规则 验证不能为空值
     * @param {type} mixed
     * @return: bool
     */
    protected function isNotEmpty($value, $rule = '', $data = '', $field = '')
    {
        if (empty($value)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @msg: 自定义验证规则 验证手机号
     * @param {type} mixed
     * @return: bool
     */
    protected function isMobile($value)
    {
        $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
