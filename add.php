<!DOCTYPE html>
<html class=" js csstransforms3d"><head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>添加学生</title>
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
							<div class="wd-msg">添加学生信息</div>
						</div>
					</div>
					<div class="Mian-cont-wrap">
						<form action="action.php?action=add" method="post">
					        <table border="0" cellspacing="0" cellpadding="0" class="defaultTable defaultTable2">
					        	<tr>
					                <td>学号<input type="text" name="student_id"></td>
					            </tr>
					            <tr>
					                <td>姓名<input type="text" name="student_name"></td>
					            </tr>
					            <tr>
					                <td>性别<input type="radio" class="man" name="student_sex" value="男">男
					                	<input type="radio" class="man" name="student_sex" value="女">女</td>
					            </tr>
					            <tr>
					                <td>班级<input type="text" name="student_class"></td>
					            </tr>
					            <tr >
					 				<td><a href="index.php" class="return">返回</td>
					                <td>
					                	<input type="submit" value="添加">
					                </td>
					                <td>
					                	<input type="reset" value="重置">
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