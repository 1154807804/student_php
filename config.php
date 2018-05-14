<?php
// 预先定义数据库链接参数
ob_start();//输出内容存入缓冲区
session_start();  //开启缓存，存入服务器端
header("content-type:text/html;charset=utf8");
$link=mysqli_connect("localhost","root","","design");
    mysqli_set_charset($link,"utf8");
if(!$link){
	die("连接失败：".mysqli_connect_error());
}
else{
	// echo "ok";
}
?>