<?php
// 预先定义数据库链接参数
$host = '127.0.0.1';
$dbuser = 'root';
$pwd = '';
$dbname = 'design';

$db = new mysqli($host,$dbuser,$pwd,$dbname);
if($db->connect_errno <> 0){
	die("链接数据库失败");
}
// 防止乱码
$db->query("SET NAMES UTF8");
