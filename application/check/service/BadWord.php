<?php
/**
 * Time: 2018/6/27 17:07
 * Created by 镜像猫工
 */

namespace app\check\service;

use app\check\model\BadWord as BadWordModel;
class BadWord
{
    /*
     * 敏感词检测
     * @param string $content 检测的内容
     * @return true（有敏感词） false（无敏感词），也可根据需求返回关键词
     */
    public static function checkBadWord($content){
        $badWordArr = BadWordModel::getBadWord();
        if (!$badWordArr) {
            throw new BadWordException();
        }
        for ($i = 0; $i < count($badWordArr) ; $i++){
            if ($badWordArr[$i] == "") {
                continue; //如果关键字为空就跳过本次循环
            }
            if (strpos('检测内容：'.$content,trim($badWordArr[$i])) != false){
                return $badWordArr[$i]; //如果匹配到关键字就返回关键字
//                return true;
            }
        }
        return false; // 如果没有匹配到关键字就返回 false
    }

}