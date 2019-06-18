<?php

header('Content-Type: text/html;charset=utf-8');
header('Access-Control-Allow-Origin:*');// *代表允许任何网址请求
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE');// 允许请求的类型
header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); // 设置允许自定义请求头的字段

// require "response.class.php";    //引入返回信息类
include "response.class.php";    //引入返回信息类
include "connectSql.php";    //引入连接数据库文件

//实例化response类
$response = new Response;
$connectSql = new ConnectSql;
$sql = "select * from user where username='张三'";

$row = $connectSql -> querySqlResult("test",$sql); //传入数据库名字和sql语句

    if(!($row=='')){
        //准备返回数据
        $code = 20000;
        $message = "信息请求成功";
        $data = array(
                "name" => "你懂的",
                "list"=>$row
            );
        
        //返回数据
        echo $response -> json($code,$message,$data);
    };
