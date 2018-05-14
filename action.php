<?php
header("content-type:text/html;charset=utf8");
$conn=mysqli_connect("localhost","root","","design");
mysqli_set_charset($conn,"utf8");
if($conn){
    switch ($_GET['action']){  
        case 'add'://add
            $student_id = $_POST['student_id'];   
            $student_name = $_POST['student_name'];
            $student_sex = $_POST['student_sex'];
            $student_class = $_POST['student_class'];
            $sql = "insert into student (`student_id`, student_name, student_sex, student_class) values ('$student_id', '$student_name','$student_sex','$student_class')";
            $rw = mysqli_query($conn,$sql);
            if ($rw > 0){
                echo "<script>alert('添加成功');</script>";
            }else{
                echo "<script>alert('添加失败');</script>";
            }
            header("Location:index.php");
            break;
        case 'del'://get
            $id=$_GET['id'];
            $sql="delete from student where id='$id'";
            $rw=mysqli_query($conn,$sql);
            if($rw>0){
                echo "<script>alert('删除成功');</script>";
            }else{
                echo "<script>alert('删除失败');</script>";
            }
            header("Location:index.php");
            break;
        case 'edit'://post
            $id=$_POST['id'];
            $student_id = $_POST['student_id'];
            $student_name = $_POST['student_name'];
            $student_sex = $_POST['student_sex'];
            $student_class = $_POST['student_class'];
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
