<?php
/**
 * Created by 镜像猫工
 * User: 镜像猫工
 * Date: 2018/1/30
 * Time: 17:21
 */

namespace app\lib\exception;


class SuccessMessage extends BaseException
{
    public $code = 201;
    public $msg = 'ok';
    public $errorCode = 0;
}