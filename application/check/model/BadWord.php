<?php
/**
 * Time: 2018/6/22 18:16
 * Created by 镜像猫工
 */

namespace app\check\model;


use think\Cache;
use think\Model;

class BadWord extends Model
{
    public static function getBadWord() {
        // 使用了Redis缓存
        $badWord = Cache::get('bad_word');
        if ($badWord) {
            return $badWord;
        }
        $badWord = self::all();
        if ($badWord) {
            // 把二维数组转换成一维数组
            foreach ($badWord as $k => $v) {
                $_badWord[] =  $v['word'];
            }
            Cache::set('bad_word', $_badWord, 0);
            return $_badWord;
        } else {
            // TODO 抛出异常
            return false;
        }

    }
}