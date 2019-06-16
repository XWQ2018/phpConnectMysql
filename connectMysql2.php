<?php
header("Content-type:text/html;charset=utf-8");

$serverName = "localhost";
$dbUser = "root";
$dbPwd = "root";
$dbName = "test";

$cn = mysqli_connect($serverName,$dbUser,$dbPwd,$dbName) or die("链接失败：" . mysqli_connect_error());
$sql = "select * from user";
$result=mysqli_query($cn,$sql);

if($result){
    echo ($result->num_rows);//查询得到结果的长度

    $row = $result->fetch_all(MYSQLI_ASSOC);//结果集处理
    echo json_encode($row,JSON_UNESCAPED_UNICODE);//解码

    /* foreach ($result as $row) {
        var_dump($row);
    } */
}
?>