<?php
/**
 * Created by 镜像猫工
 * User: 镜像猫工
 * Date: 2019/4/4
 * Time: 10:31
 */

namespace app\lib\exception;


class BadWordException extends BaseException
{
    public $code = 400;
    public $msg = '没有找到敏感词库';
    public $errorCode = 20004;
}