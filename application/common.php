<?php

// 应用公共文件

/**
 * @param string $url get请求地址
 * @param int $httpCode 返回状态码
 * @param mixed
 */
function curl_get($url,&$httpCode = 0){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

    //不做证书校验，部署在linux环境下请改位true
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
    $file_contents = curl_exec($ch);
    $httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $file_contents;
}

function curl_post($url,array $params = array()){
    $data_string = json_encode($params);
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data_string);
    curl_setopt($ch,CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json'
        )
    );
    $data = curl_exec($ch);
    curl_close($ch);
    return ($data);
}

function curl_post_raw($url,$rawData){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$rawData);
    curl_setopt($ch,CURLOPT_HTTPHEADER,
        array(
            'Content-Type: text'
        )
    );
    $data = curl_exec($ch);
    curl_close($ch);
    return ($data);
}

function getRandChar($length){
    $str = null;
    $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
    $max = strlen($strPol) - 1;

    for ($i=0; $i<$length; $i++){
        $str .= $strPol[rand(0,$max)];
    }
    return $str;
}

//二维数组转化为字符串，中间用,隔开
function arrToString($arr){
    //转换成一维数组，并截取
    foreach ($arr as $value){
        $value = join(",",$value->toArray());//模型返回的是对象，转成数组
        $temp[] = substr($value,0,-2);
    }
    //拼接字符串
    $str='';
    foreach($temp as $v){
        $str.=$v.",";
    }
    $str = substr($str,0,-1);  //利用字符串截取函数消除最后一个逗号
    return $str;
}
