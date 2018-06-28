<?php
/**
 * Created by 镜像猫工
 * User: 镜像猫工
 * Date: 2018/2/6
 * Time: 10:27
 */

namespace app\check\validate;


class PagingParameter extends BaseValidate
{
    protected $rule = [
        'page' => 'isPositiveInteger',
        'size' => 'isPositiveInteger'
    ];

    protected $message = [
        'page' => '分页参数必须是正整数',
        'size' => '分页参数必须是正整数'
    ];
}