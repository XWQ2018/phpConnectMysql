<?php
header("Content-type:text/html;charset=utf-8");  //设置编码类型

$serverName = "localhost";
$dbUser = "root";
$dbPwd = "root";
$dbName = "test";

$cn = new mysqli($serverName,$dbUser,$dbPwd,$dbName);
$sql = "select * from user";

if($cn->connect_error){
    die("连接失败: " . $cn->connect_error);
}else{
    $result= $cn->query($sql);

    // 得到所有结果
    $row=($result->fetch_all(MYSQLI_ASSOC));
    echo json_encode($row,JSON_UNESCAPED_UNICODE);
}



?>