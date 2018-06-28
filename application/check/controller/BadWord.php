<?php
/**
 * Time: 2018/6/25 16:10
 * Created by 镜像猫工
 * Copyright by XiaoDuo Game
 */

namespace app\check\controller;

use app\check\service\BadWord as BadWordService;

header("Access-Control-Allow-Origin:*");
class BadWord
{
    /*
     * 检测敏感词
     */
    public function check() {
        $content = trim(input('post.content'));
        if(!$content) {
            return ['error_msg' => '检测内容为空'];
        }
        $result = BadWordService::checkBadWord($content);
        return $result;
    }



}