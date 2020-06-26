<?php

namespace app\api\model;

class Image extends Base
{
    // 指定可显示的字段
    protected $visible=['url'];

    // url获取器
    public function getUrlAttr($value,$data)
    {
        return $this->prefixImgUrl($value,$data);
    }
}