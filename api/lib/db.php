<?php

header('Content-Type: text/html;charset=utf-8');
/* 
数据库连接操作
*/

require_once __DIR__ . "\conf.php";

// 创建连接
$conn = new mysqli(constant("HOST"), constant("SERVICEUSER"), constant("SERVICEPASS"),constant("DBNAME"));
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

echo "连接成功";