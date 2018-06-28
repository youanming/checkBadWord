<?php
/**
 * Created by 猫工
 * User: 猫工
 * Date: 2018/1/24
 * Time: 11:48
 */

namespace app\check\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs'
    ];

    protected $message = [
        'ids' => 'ids参数必须是以逗号分割的多个正整数'
    ];

    //$value = id1,id2,id3...
    protected function checkIds($value)
    {
        $values = explode(',', $value);
        if (empty($values)) {
            return false;
        }
        foreach ($values as $id) {
            if (!$this->isPositiveInteger($id)) {
                return false;
            }
        }
        return true;
    }
}