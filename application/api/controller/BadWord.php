<?php
/**
 * Time: 2018/6/28 11:31
 * Created by 镜像猫工
 * Copyright by XiaoDuo Game
 */

namespace app\api\controller;

use app\lib\exception\IsBadWordException;
use app\lib\exception\ParameterException;
use app\check\service\BadWord as BadWordService;
//header("Access-Control-Allow-Origin:*");
class BadWord
{
    /*
     * API 检测敏感词
     */
    public function check() {
        $content = trim(input('post.content'));
        if(empty($content)) {
            throw new ParameterException();
        }
        $result = BadWordService::checkBadWord($content);
        if ($result != false) {
            // 此处可重新定义抛出错误内容msg、errorCode
            throw new IsBadWordException([
                'msg' => '存在非法字符：'.$result,
                'errorCode' => 10000
            ]);
        }
        return $result;
    }
}