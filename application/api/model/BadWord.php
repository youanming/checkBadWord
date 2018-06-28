<?php
/**
 * Time: 2018/6/22 18:16
 * Created by 镜像猫工
 * Copyright by XiaoDuo Game
 */

namespace app\api\model;


use think\Cache;

class BadWord extends BaseModel
{
    public static function getBadWord() {
        $badWord = Cache::get('bad_word');
        if ($badWord) {
            return $badWord;
        }
        $badWord = self::all();
        if ($badWord) {
            foreach ($badWord as $k => $v) {
                $_badWord[] =  $v['word'];
            }
            Cache::set('bad_word', $_badWord, 0);
            return $badWord;
        } else {
            // TODO 抛出异常
            return false;
        }

    }
}