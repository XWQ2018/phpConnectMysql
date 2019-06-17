<?php
header('Content-Type: text/html;charset=utf-8');
header('Access-Control-Allow-Origin:*');// *代表允许任何网址请求
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE');// 允许请求的类型
header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); // 设置允许自定义请求头的字段

/**
 *description 用于返回指定数据格式的类
 *@param $code [int] 返回的状态码
 *@param $message [string] 返回的状态信息
 *@param $data [array] 需要返回的数据
 *
 */

 /* 
 编码：json_encode($arr,option)
 其中有2个比较常用到的参数：
    参数1：中文不转为unicode ，对应的数字 256
    JSON_UNESCAPED_UNICODE
    json_encode($arr,JSON_UNESCAPED_UNICODE/256); //JSON_UNESCAPED_UNICODE或者数字都行

参数2：不转义反斜杠，对应的数字 64
    JSON_UNESCAPED_SLASHES
    json_encode($arr,JSON_UNESCAPED_SLASHES/64); //JSON_UNESCAPED_SLASHES或者数字都行

通常json_encode只能传入一个常量，如果同时使用2个常量怎么办？
JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES = 320
使用方法:json_encode($arr,320);即可完成同时使用2个常量。
$arr = array('key'=>'中文/前面的斜杠不会被转义');
json_encode($arr,320);
效果：
{"key":"中文/前面的斜杠不会被转义"}

  */
class Response{
    public function json($code,$message,$data){
        $result = array(
                "code" => $code,
                "message" => $message,
                "data" => $data
            );
        return json_encode($result,320);//JSON_UNESCAPED_UNICODE或者数字都行
    }

}

