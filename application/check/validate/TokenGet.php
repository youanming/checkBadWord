<?php
/**
 * Created by 猫工
 * User: 猫工
 * Date: 2018/1/29
 * Time: 16:32
 */

namespace app\check\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        'code' => 'require|isNotEmpty'
    ];

    protected $message = [
        'code' => '没有code还想获取Token，做梦哦'
    ];
}