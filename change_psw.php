<?php 
    require_once("./config.php");
    mysqli_set_charset($link,"utf8");
      $sql = "SELECT * FROM user"; 
      if($_POST){
        $oldpassword = $_POST ["mpass"]; 
        $newpassword = $_POST ["newpass"]; 
        $confirm = $_POST['renewpass'];
        $sql1 = 'select password from user where id=1 ';
        $result1 = mysqli_query($link,$sql1);
        $password = mysqli_fetch_assoc($result1)['password'];
        if ($oldpassword !== $password) {
          echo "<script>alert('与原密码不符');location.href='change_psw.html';</script>";
        }
          else{
          if ($newpassword==$confirm) {
              $sql2 = 'UPDATE user SET `password`="'.$newpassword.'" where id =1';
              mysqli_query ($link,$sql2);
              echo 
              "<script>alert('修改成功');window.location='change_psw.html';</script>";
          }
        }
        }
        ?>