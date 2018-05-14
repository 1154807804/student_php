<?php
include('input.php');
include('connect.php');

$content=$_POST['content'];
$user=$_POST['user'];

$input=new input();

// $is=$input->post($content);
// if($is==false){
// 	die("留言内容的数据不正确");
// }

// $is=$input->post($user);
// if($is==false){
// 	die("留言人的数据不正确");
// }

$time=time();
$sql = "INSERT INTO msg(content,user,intime) VALUES('{$content}','{$user}','{$time}')";
$is=$db->query($sql);
// var_dump($is);
header("location:evaluateother.php");
?>