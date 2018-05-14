<?php
header('Content-type:text/html;charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['username'])){
        echo "<script>alert('用户名不能为空！');location.href='loginb.html';</script>";
    }else {
        $username=trim($_POST['username']);
    }
    if (empty($_POST['password'])){
        echo "<script>alert('密码不能为空！');location.href='loginb.html';</script>";
    }else{
        $password=$_POST['password'];
    }
}
$mysqli = new mysqli('localhost', 'root', '', 'design');
$result = $mysqli->query("SELECT password FROM studentuser WHERE username = "."'$username'");
$rs=$result->fetch_row();
if (!empty($rs)){
    if ($password != $rs[0]) {
        echo "<script>alert('密码错误！');location.href='loginb.html';</script>";
    }else{
        echo "<script>alert('登录成功！');location.href='./student/Index.html';</script><br>";
    }
}else{
    echo "<script>alert('没有此用户！');location.href='loginb.html';</script>";
}
