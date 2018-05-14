<!DOCTYPE html>
<html class=" js csstransforms3d"><head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>学生管理</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/page.css">
    <!--[if lte IE 8]>
    <link href="css/ie8.css" rel="stylesheet" type="text/css"/>
    <![endif]-->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/modernizr.js"></script>
    <!--[if IE]>
    <script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
    <![endif]-->
    <script>
      function doDel(id){
        if(confirm('确认删除？')){
          window.location='action.php?action=del&id='+id;
        }
      }
    </script>
</head>

<body style="background: #f6f5fa;">
    <!--content S-->
    <div class="super-content">
        <div class="superCtab">
            <div class="ctab-title clearfix"><h3>学生信息管理</h3></div>
            
            <div class="ctab-Main">
                <div class="ctab-Main-title">
                    <ul class="clearfix">
                        <li class="cur"><a href="index.php">浏览学生</a></li>
                        <li><a href="add.php">添加学生</a></li>
                    </ul>
                </div>
                
                <div class="ctab-Mian-cont">
                    <div class="Mian-cont-btn clearfix">
                        <div class="operateBtn">
                            <div class="wd-msg">浏览学生信息</div>
                        </div>
                    </div>
                    <div class="Mian-cont-wrap">
                        <table border="0" cellspacing="0" cellpadding="0" class="defaultTable defaultTable2">
                            <tr>
                                <th>ID</th>
                                <th>学号</th>
                                <th>姓名</th>
                                <th>性别</th>
                                <th>班级</th>
                                <th>操作</th>
                            </tr>
                            <?php
                                // 1. 链接数据库
                             header("content-type:text/html;charset=utf8");
                             $conn=mysqli_connect("localhost","root","","design");
                                    mysqli_set_charset($conn,"utf8");
                             //2.执行sql
                             $sql_select = "select * from student";
                             foreach ( $conn->query($sql_select) as $row) {
                             echo "<tr>";
                             echo "<th>{$row['id']} </th>";
                             echo "<th>{$row['student_id']}</th>";
                             echo "<th>{$row['student_name']} </th>";
                             echo "<th>{$row['student_sex']} </th>";
                             echo "<th>{$row['student_class']}</th>";
                             echo "<th>
                                      <div class='btn'>
                                        <a href='edit.php?id={$row["id"]}' class='modify'>修改</a>
                                        <a href='javascript:void(0);' class='delete'
                                       onclick='doDel({$row['id']})' >删除</a>
                                      </div>
                                    </th>";
                             echo "</tr>";
                                    }
                             ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body></html>