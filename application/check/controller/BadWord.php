<?php
/**
 * Time: 2018/6/25 16:10
 * Created by 镜像猫工
 */

namespace app\check\controller;

use app\check\service\BadWord as BadWordService;
// 跨域header，根据业务需要，看是否添加
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