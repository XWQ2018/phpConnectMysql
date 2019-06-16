<?php
//定义函数
class ConnectSql{
    public function querySqlResult($dataBaseName,$sql){
        $serverName = "localhost";
        $dbUser = "root";
        $dbPwd = "root";
        $dbName = $dataBaseName;

        $cn = new mysqli($serverName,$dbUser,$dbPwd,$dbName);
        if($cn->connect_error){
            die("连接失败: " . $cn->connect_error);
        }

        $result= $cn->query($sql);
        // 得到所有结果
        $row=($result->fetch_all(MYSQLI_ASSOC));
        // $row=mysqli_fetch_all($result,MYSQLI_ASSOC); //上下两种写法都可以

        return $row;

        // 释放结果集 
        $cn->close();
        // mysqli_free_result($result); 

        //关闭连接
        $cn->close();
        // mysqli_close($con); 
    }

}






?>