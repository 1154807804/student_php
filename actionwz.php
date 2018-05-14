<?php
header("content-type:text/html;charset=utf8");
$conn=mysqli_connect("localhost","root","","design");
mysqli_set_charset($conn,"utf8");
if($conn){
    switch ($_GET['action']){  
        case 'add':
            $id = $_POST['id'];   
            $title = $_POST['title'];
            $content = $_POST['content'];
            $author = $_POST['author'];
            $created_at = $_POST['created_at'];
            $updated_at = $_POST['updated_at'];
            $sql = "insert into news (`title`, `content`, `created_at`) values ('$title', '$content','$created_at')";
            $rw = mysqli_query($conn,$sql);
            if ($rw > 0){
                echo "<script>alert('添加成功');</script>";
            }else{
                echo "<script>alert('添加失败');</script>";
            }
            header("Location:wenzhang_xinwen.php");
            break;
        case 'del'://get
            $id=$_GET['id'];
            $sql="delete from news where id='$id'";
            $rw=mysqli_query($conn,$sql);
            if($rw>0){
                echo "<script>alert('删除成功');</script>";
            }else{
                echo "<script>alert('删除失败');</script>";
            }
            header("Location:wenzhang_xinwen.php");
            break;
        case 'edit'://post
            $id = $_POST['id'];   
            $title = $_POST['title'];
            $content = $_POST['content'];
            $author = $_POST['author'];
            $created_at = $_POST['created_at'];
            $updated_at = $_POST['updated_at'];
            $sql="update student set student_id='$student_id',student_name='$student_name',student_sex='$student_sex',student_class='$student_class' where id='$id';";
            $rw=mysqli_query($conn,$sql);
            if($rw>0){
                echo "<script>alert('更新成功');</script>";
            }else{
                echo "<script>alert('更新失败');</script>";
            }
            header("Location:index.php");
            break;
        default:
            header("Location:index.php");
            break;
            }
        }else{
            die('数据库连接失败'.mysqli_connect_error());
        }
        ?>
