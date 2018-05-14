<?php
header("content-type:text/html;charset=utf8");
         $conn=mysqli_connect("localhost","root","","design");
                mysqli_set_charset($conn,"utf8");
         $sql_select = "select * from news";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>
	学生信息管理平台
</title><link href="../../Style/StudentStyle.css" rel="stylesheet" type="text/css" />
<link href="../../Script/jBox/Skins/Blue/jbox.css" rel="stylesheet" type="text/css" />
<link href="../../Style/ks.css" rel="stylesheet" type="text/css" />
    <script src="../../Script/jBox/jquery-1.4.2.min.js" type="text/javascript"></script>

</head>
<body>

    <div class="banner">
        <div class="bgh">
            <div class="page">
                <div class="topxx">
                   <a href="../Account/ChangePasswd.aspx.html">密码修改</a> <a onclick="location.href='../../../loginb.html'" style="cursor: pointer;">安全退出</a>
                </div>
                <div class="blog_nav">
                    <ul>
                        <li><a href="../../Index.html"> 个人中心</a></li><!--我的信息 -->
                        <li><a href="../../EducationCenter/Score.aspx.html">我的课程</a></li><!--教务中心-->
                        <li><a href="../../evaluate/evaluateme.php">我的评价</a></li><!--我的学费-->
                        <li><a href="../../MyAccount/liuyanban.html">留言板</a></li><!--资料中心-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page">
        <div class="box mtop">
           <div class="leftbox">
                <div class="l_nav2">
                    <div class="ta1">
                        <strong>个人中心</strong>
                        <div class="leftbgbt">
                        </div>
                    </div>
                    <div class="cdlist">
                        <div>
                            <a href="../../MyInfo/Index.aspx.html">我的信息</a></div>
                        <div>
                            <a href="../../MyInfo/ClassInfo.aspx.html">班级信息 </a>
                        </div>
                        <div>
                            <a href="../../User/StudentInfor/Letter.aspx.html">短信息</a></div>
                        <div>
                            <a href="../../User/StudentInfor/systemMsge.aspx.php">通知</a></div>
                        <div>
                            <a href="../../MyInfo/Objection.aspx.html">我的作品</a></div>
                    </div>
                    <div class="ta1">
                        <strong>课程中心</strong>
                        <div class="leftbgbt2">
                        </div>
                    </div>
                    <div class="cdlist">
                        <div>
                            <a href="../../EducationCenter/Application.aspx.html">我的课程</a></div>
                        <div>
                            <a href="../../EducationCenter/Score.aspx.html">章节测试</a></div>
                        <div>
                            <a href="../../EducationCenter/Book.aspx.html">我的成绩</a></div>
                        <div><a href="../../OnlineTeaching/StudentMaterial.aspx.html">资料下载</a></div>
                    </div>
                    <div class="ta1">
                        <strong>评价中心</strong><div class="leftbgbt2">
                        </div>
                    </div>
                    <div class="cdlist">
                        <div>
                            <a href="../../evaluate/EvaluateTable.html">表现性评价量表</a></div>
                        <div>
                            <a href="../../evaluate/evaluateme.php">作品评价</a></div>
                    </div>
                   
                    <div class="ta1">
                        <strong>留言中心</strong><div class="leftbgbt2">
                        </div>
                    </div>
                    <div class="cdlist">
                        <div>
                            <a href="../../historyinfo/historyinfo.html">历史留言信息</a></div>
                    </div>
<div class="ta1">
                        <a href="http://eip.imnu.edu.cn/EIP/" target="_blank"><strong>教学系统</strong></a>
                        <div class="leftbgbt2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightbox">
                
<h2 class="mbx">我的信息 &gt; 通知</h2>
<div class="morebt">
    

<ul id="ulStudMsgHeadTab">
    <li><a class="tab2" onclick="" href="../../MyInfo/Index.aspx.html">个人资料</a> </li>
    <li><a class="tab2" onclick="" href="../../MyInfo/ClassInfo.aspx.html">班级信息</a></li>
    <li><a class="tab2" onclick="" href="Letter.aspx.html">短信息</a></li>
    <li><a class="tab1" onclick="" href="systemMsge.aspx.php">通知<span style="color:#ff0000; padding-left:5px;" id="unreadSysMsgCount"></span></a></li>
    <li><a class="tab2" onclick="" href="../../MyInfo/Objection.aspx.html">我的作品</a></li>
</ul>

</div>
<div class="cztable">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <!-- <th style="text-align:left;" width="5%">序号</th> -->
            <th width="15%">标题</th>
            <th width="20%">内容</th>
            <th style="text-align:center;" width="10%">作者</th>
            <th style="text-align:left;" width="10%">发布时间</th>
        </tr>
        <?php 
         foreach ( $conn->query($sql_select) as $row) {
             echo "<tr style='height: 28px' class='tdbg' align='left'>";
             echo "<td width='15%' style='text-align:center;'>{$row['title']}</td>";
             echo "<td width='20%' style='text-align:center;'>{$row['content']}</td>";
             echo "<td style='text-align:center;' width='10%'>{$row['author']}</td>";
             echo "<td style='text-align:left;' width='10%'>{$row['created_at']}</td>";
             echo "</tr>";
            }
         ?>
    </table>
</div>


            </div>
        </div>
        <div class="footer">
            <p>
                &copy;copyright 2012 广博教育 csgb.net 版权所有 站长统计</p>
        </div>
    </div>
</body>
</html>
