<?php
/**
 * Time: 2018/6/22 18:42
 * Created by 镜像猫工
 */

namespace app\lib\exception;


class IsBadWordException extends BaseException
{
    public $code = 400;
    public $msg = '存在非法字符';
    public $errorCode = 20004;
}