<!DOCTYPE html>
<html class=" js csstransforms3d"><head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>学生评价</title>
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/page.css">
	<link href="./student/Style/StudentStyle.css" rel="stylesheet" type="text/css" />
	<link href="./student/Script/jBox/Skins/Blue/jbox.css" rel="stylesheet" type="text/css" />
	<link href="./student/Style/ks.css" rel="stylesheet" type="text/css" />
	<!--[if lte IE 8]>
	<link href="css/ie8.css" rel="stylesheet" type="text/css"/>
	<![endif]-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/modernizr.js"></script>
	<!--[if IE]>
	<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
	<style>
		.Mian-cont-wrap {
		    background: url(images/zuopinbg2.jpg) !important;
		}
    	td input{
    		width: 100%;
    		height: 100%;
    		border: none;
    		padding: 10px 0;
    		border: 1px solid #ECECEC;
    		
    	}
    	.submit{
    		width: 100px;
    		height: 40px;
    		font-size: 20px;
    		background: #cfe1f9 ;
    		font-family: "kaiti";
    		float: right;
    		margin-top: 20px;
    		color: #185697;
    	}
    	.submit_tip{
    		color: red;
    		float: left;
    		margin-top: 30px;
    	}
    	.defaultTab-T th{
    		padding: 20px 0;
    	}
    	.defaultTab-T td{
    		text-align: center;
    		border-bottom: 1px solid #E3E3E3;
    	}
    	
    	/*作品start*/
    	table {
    		padding-left: 20px;
    		background: url(images/zuopinbg2.jpg);
    		background-size: cover;
    	}
    	th{
    		font-size: 18px;
    	}
    	td{
    		padding: 10px 0;
    	}
    	.zuopin tr{
    		height: 50px;
    	}
    	.zuopin td:nth-child(1){
    		text-align: center;
    	}
    	/*test*/
    	.test table{
    		text-align: center;
    		font-size: 30px;
    		padding: 50px;
    	}
    	.zuopin td{
			border-bottom: 1px solid #E3E3E3;
			padding: 20px 0;
    	}
    	
    </style>
</head>

<body style="background: #f6f5fa;">

	<!--content S-->
	<div class="super-content RightMain" id="RightMain">
		
		<!--header-->
		<form action="action.php?action=edit" method="post">
			
		<div class="superCtab">
			<div class="ctab-title clearfix">
				<h3>学生评价</h3>
			</div>
			<!--表现型评价量表 start-->
			<div class="ctab-Main">
				<div class="ctab-Main-title">
					<ul class="clearfix">
						<li><a href="zixun_dtl.php">第一章</a></li>
						<li class="cur"><a href="zixun_dtl1.php">第二章</a></li>
						<li><a href="zixun_dtl2.php">第三章</a></li>
						<li><a href="zixun_dtl3.php">第四章</a></li>
						<li><a href="zixun_dtl4.php">第五章</a></li>
						<li><a href="zixun_dtl5.php">第六章</a></li>
						<li><a href="zixun_dtl6.php">第七章</a></li>
					</ul>
				</div>
				
				<div class="ctab-Mian-cont">
					<div class="Mian-cont-btn clearfix">
                        <div class="operateBtn">
                            <div class="wd-msg">表现性评价量表</div>
                        </div>
                    </div>
					<div class="Mian-cont-wrap">
						<div class="defaultTab-T">
							<form> 
						        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="color: black;">
						          <tr>
						          <tr>
						          	<th width="10%">评价项目</th>
						          	<th width="10%">权重</th>
						          	<th width="50%">评价要点</th>
						          	<th width="10%">学生自评</th>
						          	<th width="10%">组内互评</th>
						          	<th width="10%">教师评价</th>
						          </tr>
						          <tr>
						          	<td rowspan="5">学习态度</td>
						          	<td  rowspan="5">25</td>
						          	<td>遵守课堂纪律，学生状态积极，做好学习准备(5)</td>
						          	<td>5</td>
						          	<td>4</td>
						          	<td>4</td>
						          </tr>
						          <tr>

						          	<td>积极参与实践活动，能发现并提出问题，能主动分析问题，并能积极思考(创新能力)(5)</td>
						          	<td>4</td>
						          	<td>5</td>
						          	<td>4</td>
						          </tr>
						          <tr>

						          	<td>能有效组织，利用时间，成员合作密切，愉快(5)</td>
						          	<td>4</td>
						          	<td>4</td>
						          	<td>4</td>
						          </tr>
						          <tr>

						          	<td>能在活动中，研究态度认真，有毅力(5)</td>
						          	<td>5</td>
						          	<td>5</td>
						          	<td>4</td>
						          </tr>
						          <tr>

						          	<td>尊重教师和小组成员，积极为小组主题开展而努力(5)</td>
						          	<td>4</td>
						          	<td>5</td>
						          	<td>5</td>
						          </tr>
						          <tr>
						          	<td rowspan="6">学习结果</td>
						          	<td  rowspan="6">60</td>

						          	<td>能根据问题确定信息需求和信息来源，并选择恰当的方法获取信息(10)</td>
						          	<td>8</td>
						          	<td>8</td>
						          	<td>9</td>
						          </tr>
						          <tr>

						          	<td>能掌握网络信息检索的几种主要策略和技巧(10)</td>
						          	<td>9</td>
						          	<td>9</td>
						          	<td>7</td>
						          </tr>
						          <tr>

						          	<td>掌握信息价值判断的基本方法，学会鉴别与评价信息(10)</td>
						          	<td>8</td>
						          	<td>9</td>
						          	<td>8</td>
						          </tr>
						          <tr>

						          	<td>能利用现代信息交流渠道广泛的开展合作，解决生活和学习中的问题(10)</td>
						          	<td>9</td>
						          	<td>8</td>
						          	<td>9</td>
						          </tr>
						          <tr>

						          	<td>不利于网络做与学习无关的事(10)</td>
						          	<td>8</td>
						          	<td>7</td>
						          	<td>9</td>
						          </tr>
						          <tr>

						          	<td>能在给定的时间内完成任务（两课时）(10)</td>
						          	<td>8</td>
						          	<td>8</td>
						          	<td>7</td>
						          </tr>
						          <tr>
						          	<td rowspan="4">遵守道德和法律</td>
						          	<td  rowspan="4">15</td>

						          	<td>不发布虚假或涉及黄，赌，毒等有害他人身心健康的信息(4)</td>
						          	<td>4</td>
						          	<td>3</td>
						          	<td>4</td>
						          </tr>
						          <tr>

						          	<td>保护他人知识产权(4)</td>
						          	<td>4</td>
						          	<td>4</td>
						          	<td>4</td>
						          </tr>
						          <tr>

						          	<td>不做危害计算机信息网络安全的事(4)</td>
						          	<td>4</td>
						          	<td>4</td>
						          	<td>4</td>
						          </tr>
						          <tr>

						          	<td>不故意损坏公共机房设施(3)</td>
						          	<td>3</td>
						          	<td>3</td>
						          	<td>3</td>
						          </tr>
						        </table>
					        </form>
					</div>
				
				</div>
				
				
				<!--作品评价  start-->
				<div class="zuopin">
					<div class="zuopin_title">
						<!--作品评价-->
						<div class="Mian-cont-btn clearfix">
	                        <div class="operateBtn">
	                            <div class="wd-msg">作品评价</div>
	                        </div>
                   		</div>
					</div>
					<div class="zuopin_content">
						<div class="Mian-cont-wrap">
							<table>
								<tr>
									<th width="20%">组内成员</th>
									<th width="80%">评价内容</th>
								</tr>
								<tr>
									<td>王丽丽</td>
									<td >
										1.作品内容详实，但对于学生课程过程的分析并不够准确<br />
										2.都能充分挖掘课程资源，根据实际教学条件，利用黑板、白板、教学挂图、实物等的同时积极利用音像、网络以及计算机多媒体等教育资源，丰富了教学内容和形式。<br /> 
										3.教学资源题材多样、内容丰富、语言真实。最大限度激发了学生学习兴趣、开阔了学生的视野、拓展了学生的思维。<br />
									</td>
								</tr>
								<tr>
									<td>杨凯</td>
									<td>
										1.创设情境，让学生愿意主动参与学习。<br />
										2.重视探究活动，形成自主学习的能力。<br />
										3.重视课堂语言的科学性、严谨性。
									</td>
								</tr>
								<tr>
									<td>胡斌</td>
									<td>
										1.让学生在“温故”中知新，在“探究”中学习，在“合作”中增知，突出学生的主体地位。<br />
										2.设置问题情境，引导学生在思考、讨论、探究中学习理解人民代表大会制度。<br />
										3.引导学生运用所学知识原理分析理解政治现象，提高自己分析问题、解决问题的能力，以及主动学习、合作探究的能力。
									</td>
								</tr>
								<tr>
									<td>李友</td>
									<td>
										1.创设情境，让学生愿意主动参与学习。<br />
										2.重视探究活动，形成自主学习的能力。<br />
										3.重视课堂语言的科学性、严谨性。

									</td>
								</tr>
								<tr>
									<td>张文品</td>
									<td>
										1.让学生在“温故”中知新，在“探究”中学习，在“合作”中增知，突出学生的主体地位。<br />
										2.设置问题情境，引导学生在思考、讨论、探究中学习理解人民代表大会制度，引导学生运用所学知识原理分析理解政治现象。<br />
										3.提高自己分析问题、解决问题的能力，以及主动学习、合作探究的能力。并确立坚持和完善这一根本政治制度的情感态度价值观。<br />
										4.全面提高学生的思想政治素质。
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			<!--作品评价  end-->
			
			
			<!--测试成绩  start-->
				<div class="test">
					<div class="test_title">
						<!--作品评价-->
						<div class="Mian-cont-btn clearfix">
	                        <div class="operateBtn">
	                            <div class="wd-msg">测试成绩</div>
	                        </div>
                   		</div>
					</div>
					<div class="test_content">
						<div class="Mian-cont-wrap">
							<table>
								<th width="50%">测试成绩:</th>
								<th width="50%" style="color: red;">85</th>
							</table>
								
						</div>
					</div>
				</div>
			<!--测试成绩 end-->
				</div>
			</div>
			<!--表现型评价量表end-->
			
		</form>
		
	</div>
	<!--content E-->

</body></html>