<?php
/**
 * Time: 2018/6/25 16:10
 * Created by 镜像猫工
 * Copyright by XiaoDuo Game
 */

namespace app\api\controller\v1;

use app\api\service\Bless as BlessService;
use app\lib\exception\ParameterException;

class BadWord
{
    /*
     * 检测敏感词
     * 此方法对外开放接口
     * @param string $content 检测的内容
     * @return true（有敏感词） false（无敏感词）
     */
    public function check() {
        $content = '内容+'.trim(input('post.content'));
        if(empty($content)) {
            throw new ParameterException();
        }
        $result = $this->checkBadWord($content);
        return $result;
    }



}