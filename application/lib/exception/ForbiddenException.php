<?php
/**
 * Created by 镜像猫工
 * User: 镜像猫工
 * Date: 2018/1/31
 * Time: 14:09
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '权限不够';
    public $errorCode = 10001;
}