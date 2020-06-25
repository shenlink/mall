<?php

namespace app\api\validate;

use think\Validate;
use app\api\exception\ParameterException;

/*
 * @Description:验证器基类
 * @Author: shenlink
 * @Date: 2020-06-24 22:18:56
 * @LastEditors: shenlink
 * @LastEditTime: 2020-06-25 10:49:11
 */

class BaseValidate extends Validate
{
    /**
     * @msg: 验证单个参数
     * @param {type}
     * @return: mixed
     */
    public function checkParam($param)
    {
        // 判断http参数是否过多
        if (count($param) > 1) {
            throw new ParameterException([
                'msg' => '参数过多',
            ]);
        }

        // $this就是validate对象 因为类继承了Validate
        $result = $this->check($param);

        if (!$result) {

            // 如果参数校验不通过 进行异常处理
            throw new ParameterException([
                'msg' => $this->error,
            ]);
        } else {

            return true;
        }
    }
}
