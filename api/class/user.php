<?php
require_once "..\lib\headerContent.php";
require_once "..\lib\db.php";
require "..\lib\\response.class.php";  //碰到转义字符需要转义

//实例化类
$response = new Response;

$sql = "select * from user";

$result = $conn->query($sql);

if(mysqli_num_rows($result)<1){
    $resultInfo=[
        "code"=>"41000",
        "message"=>"查询失败"
    ];
    echo json_decode($resultInfo,320);
}else{

    // 得到所有结果
    $row=($result->fetch_all(MYSQLI_ASSOC));

    //返回数据
    $code = 20000;
    $message = "信息请求成功";
    $data = [
            "name" => "zhanggong",
            "list"=>$row
    ];

    echo $response->json($code,$message,$data);

    // 释放结果集 
    $result->close();
    // mysqli_free_result($result); //面向过程写法

    //关闭连接
    $conn->close();
    // mysqli_close($con);
}
