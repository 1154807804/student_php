<!DOCTYPE html>
<html class=" js csstransforms3d"><head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>修改学生信息</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/page.css">
    <style type="text/css">
        table{
            font-size: 20px;
        }
        input{
            padding-left: 5px;
            height: 30px;
            margin-left: 10px;
            background: transparent;
        }
        table .man{
            vertical-align: middle;
        }
        
    </style>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/modernizr.js"></script>
</head>

<body style="background: #f6f5fa;">
    <?php
//1. 链接数据库
    header("content-type:text/html;charset=utf8");
    $conn=mysqli_connect("localhost","root","","design");
    mysqli_set_charset($conn,"utf8");
    $id=$_GET['id'];
 //2.执行sql
    $sql_select = "select * from student where id='$id'";
    $stmt = mysqli_query($conn,$sql_select);
    $student = mysqli_fetch_assoc($stmt); 
 ?>


    <!--content S-->                     
    <div class="super-content">
        <div class="superCtab">
            <div class="ctab-title clearfix"><h3>学生信息管理</h3></div>
            
            <div class="ctab-Main">
                <div class="ctab-Main-title">
                    <ul class="clearfix">
                        <li><a href="index.php">浏览学生</a></li>
                        <li class="cur"><a href="add.php">添加学生</a></li>
                    </ul>
                </div>
                
                <div class="ctab-Mian-cont">
                    
                    <div class="Mian-cont-btn clearfix">
                        <div class="operateBtn">
                            <div class="wd-msg">修改学生信息</div>
                        </div>
                    </div>
                    
                    <div class="Mian-cont-wrap">
                        <form action="action.php?action=edit" method="post">
                            <input type="hidden" name="id" value="<?php echo $student['id'];?>">
                            <table border="0" cellspacing="0" cellpadding="0" class="defaultTable defaultTable2">
                                <tr>
                                    <td>
                                        学号
                                        <input type="text" name="student_id" value="<?php echo $student['student_id'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        姓名
                                        <input type="text" name="student_name" value="<?php echo $student['student_name'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>性别
                                    <!-- </td>
                                    <td> -->
                                        <input type="radio" class="man" name="student_sex" value="男"
                                        <?php echo($student['student_sex']=="男")?"checked":"";?>>男
                                    <!-- </td> 
                                    <td> -->
                                        <input type="radio" class="man" name="student_sex" value="女"<?php echo($student['student_sex']=="女")?"checked":"";?>>女
                                    </td>
                                </tr>
                                <tr>
                                    <td>班级<input type="text" name="student_class" value="<?php echo $student['student_class']?>"></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;">
                                        <input style="padding-left: 0" type="submit" value="修改">
                                    </td>
                                    <td style="position: relative;">
                                        <input type="reset" style="position: absolute;right: 1170px;top: 14px;" value="重置">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>