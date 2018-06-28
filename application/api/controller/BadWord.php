<?php
/**
 * Time: 2018/6/25 16:10
 * Created by 镜像猫工
 * Copyright by XiaoDuo Game
 */

namespace app\api\controller;

use app\api\service\BadWord as BadWordService;
use app\lib\exception\ParameterException;

class BadWord
{
    /*
     * 检测敏感词
     * 此方法对外开放接口
     */
    public function check() {
        $content = '内容:'.trim(input('post.content'));
        if(empty($content)) {
            throw new ParameterException();
        }
        $result = BadWordService::checkBadWord($content);
        return $result;
    }



}