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

class RequestList{
    public function login($username,$password){
        $userName = isset($username)?$username:"";
        $password = isset($password)?$password:"";

        if(empty($userName) || empty($password)){
            $result = array(
                "code" => "2004",
                "message" => "参数不能为空",
                "status" => "no"
            );
            echo json_encode($result,320);//JSON_UNESCAPED_UNICODE或者数字都行
        }else{
            $sql = "select * from user where username='$userName' && password='$password'";
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
        }
    }

}



