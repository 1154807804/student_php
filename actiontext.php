<?php
header("content-type:text/html;charset=utf8");
$conn=mysqli_connect("localhost","root","","design");
mysqli_set_charset($conn,"utf8");
if($conn){
    switch ($_GET['action']){  
        case 'add'://add
            $id = $_POST['id'];   
            $title = $_POST['title'];
            $content = $_POST['content'];
            $author = $_POST['author'];
            $created_at = $_POST['created_at'];
            $updated_at = $_POST['updated_at'];
            $sql = "insert into text (`title`, `content`, `created_at`) values ('$title', '$content','$created_at')";
            $rw = mysqli_query($conn,$sql);
            if ($rw > 0){
                echo "<script>alert('添加成功');</script>";
            }else{
                echo "<script>alert('添加失败');</script>";
            }
            header("Location:class_text.php");
            break;
        case 'del'://get
            $id=$_GET['id'];
            $sql="delete from text where id='$id'";
            $rw=mysqli_query($conn,$sql);
            if($rw>0){
                echo "<script>alert('删除成功');</script>";
            }else{
                echo "<script>alert('删除失败');</script>";
            }
            header("Location:class_text.php");
            break;
        default:
            header("Location:class_text.php");
            break;
            }
        }else{
            die('数据库连接失败'.mysqli_connect_error());
        }
        ?>
