<!DOCTYPE html>
<html class=" js csstransforms3d"><head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>信息发布</title>
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
          window.location='actionwz.php?action=del&id='+id;
        }
      }
</script>
</head>

<body style="background: #f6f5fa;">

	<!--content S-->
	<div class="super-content RightMain" id="RightMain">
		
		<!--header-->
		<div class="superCtab">
			<div class="ctab-title clearfix"><h3>信息发布</h3></div>
			
			<div class="ctab-Main">
				<div class="ctab-Main-title">
					<ul class="clearfix">
						<li class="cur"><a href="wenzhang_zhuoyue.html">通知公告</a></li>
					</ul>
				</div>
				
				<div class="ctab-Mian-cont">
					<div class="Mian-cont-btn clearfix">
						<div class="operateBtn">
							<a href="wenzhang_fabu.php" class="greenbtn publish">发布公告</a>
						</div>
					</div>
					
					<div class="Mian-cont-wrap">
						<div class="defaultTab-T">
							<table border="0" cellspacing="0" cellpadding="0" class="defaultTable">
								<tbody><tr><th class="t_1">标题</th><th class="t_2">内容</th><th class="t_3">发布时间</th><th class="t_4">操作</th></tr>
							</tbody></table>
						</div>
						<table border="0" cellspacing="0" cellpadding="0" class="defaultTable defaultTable2">
							<tbody>
								<?php
                                // 1. 链接数据库
                             header("content-type:text/html;charset=utf8");
                             $conn=mysqli_connect("localhost","root","","design");
                                    mysqli_set_charset($conn,"utf8");
                             //2.执行sql
                             $sql_select = "select * from news";
                             //3.data 解析
                             foreach ( $conn->query($sql_select) as $row) {
                             echo "<tr>";
                             echo "<td class='t_1'>{$row['title']} </td>";
                             echo "<td class='t_2'><a href='#'>{$row['content']}</a></td>";
                             echo "<td class='t_3'>{$row['created_at']} </th>";
                             echo "<td class='t_4'>
                                      <div class='btn'>
                                        <a href='javascript:void(0);' class='delete' onclick='doDel({$row['id']})'>删除</a>
                                      </div>
                                    </td>";
                             echo "</tr>";
                                    }
                             ?>
						</tbody></table>
					</div>
				
				</div>
			</div>
		</div>
		<!--main-->
		
	</div>
</body></html>