<?php
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
                "name" => "你爸爸",
                "list"=>$row
            );
        
        //返回数据
        echo $response -> json($code,$message,$data);
    };
