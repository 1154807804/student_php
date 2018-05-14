<!DOCTYPE html>
<html class=" js csstransforms3d"><head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>学生评价信息管理</title>
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/page.css">
	<style type="text/css">
		.pingjia{
			text-decoration: underline;
		}
		.pingjia:hover{
			color: red;
			cursor: pointer;
		}
	</style>
	<!--[if lte IE 8]>
	<link href="css/ie8.css" rel="stylesheet" type="text/css"/>
	<![endif]-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/modernizr.js"></script>
	<!--[if IE]>
	<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
</head>

<body style="background: #f6f5fa;">

	<!--content S-->
	<div class="super-content">
		<div class="superCtab">
			<div class="ctab-title clearfix"><h3>学生评价信息管理</h3></div>
			
			<div class="ctab-Main">
				
				<div class="ctab-Mian-cont">
					<div class="Mian-cont-btn Mian-cont-btn2 clearfix" style="height: 10px;">
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
                             //    1. 链接数据库
                             header("content-type:text/html;charset=utf8");
                             $conn=mysqli_connect("localhost","root","","design");
                                    mysqli_set_charset($conn,"utf8");
                             //2.执行sql
                             $sql_select = "select * from student";
                             //3.data 解析
                             foreach ( $conn->query($sql_select) as $row) {
                             echo "<tr>";
                             echo "<th>{$row['id']} </th>";
                             echo "<th>{$row['student_id']}</th>";
                             echo "<th>{$row['student_name']} </th>";
                             echo "<th>{$row['student_sex']} </th>";
                             echo "<th>{$row['student_class']}</th>";
                             echo "<th>
                                      <div class='btn'>
                                        <a href='zixun_dtl.php' class='modify'>查看评价</a>
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
		<!--main-->
		
	</div>
	<!--content E-->




</body></html>