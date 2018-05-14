<?php
$host = '127.0.0.1';
$dbuser = 'root';
$pwd = '';
$dbname = 'design';
$db = new mysqli($host,$dbuser,$pwd,$dbname);
$db->query("SET NAMES UTF8");
// 检查是否成功
if($db->connect_errno <> 0){
    echo "链接失败";
    echo $db->connect_errno;
    exit;
}
$sql="SELECT * FROM msg ORDER BY id DESC";
$mysqli_result=$db->query($sql);
if($mysqli_result===false){
    echo "SQL错误";
    exit;
}
$rows=[];
while ($row=$mysqli_result->fetch_array(MYSQLI_ASSOC)){
    $rows[] = $row;
}
// 打印输出
// var_dump($rows);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>
	档案袋评定系统
</title>
<style type="text/css">
body,div,h2,h3,ul,li,p{margin:0;padding:0;}
a{text-decoration:none;}
a:hover{text-decoration:underline;}
ul{list-style-type:none;}
body{
	color:#333;
	/*background:#a7ab8c;*/
	font:12px/1.5 \5b8b\4f53;}
#msgBox{
	background:#fff;
	border-radius:5px;
	margin:10px auto;
	padding-top:10px;
	/*border-top: 10px solid gainsboro;*/
	border: 2px dashed gainsboro;
	display: none;
}
#msgBox:first-child{
	display: block;
}

#msgBox form h2{font-weight:400;font:400 18px/1.5 \5fae\8f6f\96c5\9ed1;}
#msgBox form{background:url(img/boxBG.jpg) repeat-x 0 bottom;padding:0 20px 15px;}
#userName,#conBox{color:#777;border:1px solid #d0d0d0;border-radius:6px;background:#fff url(img/inputBG.png) repeat-x;padding:3px 5px;font:14px/1.5 arial;}
#userName.active,#conBox.active{border:1px solid #7abb2c;}
#userName{height:20px;}
#conBox{width:448px;resize:none;height:65px;overflow:auto;}
#msgBox form div{position:relative;color:#999;margin-top:10px;}
#msgBox img{border-radius:3px;}
#face{position:absolute;top:0;left:172px;}
#face img{width:30px;height:30px;cursor:pointer;margin-right:6px;opacity:0.5;filter:alpha(opacity=50);}
#face img.hover,#face img.current{width:28px;height:28px;border:1px solid #f60;opacity:1;filter:alpha(opacity=100);}
#sendBtn{border:0;width:112px;height:30px;cursor:pointer;margin-left:10px;background:url(img/btn.png) no-repeat;}
#sendBtn.hover{background-position:0 -30px;}
#msgBox form .maxNum{font:26px/30px Georgia, Tahoma, Arial;padding:0 5px;}
#msgBox .list{padding:10px;}
#msgBox .list h3{
	position:relative;
	height:33px;
	font-size:14px;
	font-weight:bolder;
	/*background:#e3eaec;*/
	border:1px solid #dee4e7;
}
#msgBox .list h3 span{position:absolute;left:6px;top:6px;background:#fff;line-height:28px;display:inline-block;padding:0 15px;}
#msgBox .list ul{overflow:hidden;zoom:1;}
#msgBox .list ul li{float:left;clear:both;width:100%;border-bottom:1px dashed #d8d8d8;padding:10px 0;background:#fff;overflow:hidden;}
#msgBox .list ul li.hover{background:#f5f5f5;}
#msgBox .list .userPic{float:left;width:50px;height:50px;display:inline;margin-left:10px;border:1px solid #ccc;border-radius:3px;}
#msgBox .list .content{float:left;width:400px;font-size:14px;margin-left:10px;font-family:arial;word-wrap:break-word;}
#msgBox .list .userName{display:inline;padding-right:5px;}
#msgBox .list .userName a{color:#2b4a78;}
#msgBox .list .msgInfo{display:inline;word-wrap:break-word;}
#msgBox .list .times{color:#889db6;font:12px/18px arial;margin-top:5px;overflow:hidden;zoom:1;}
#msgBox .list .times span{float:left;}
#msgBox .list .times a{float:right;color:#889db6;display:none;}
.tr{overflow:hidden;zoom:1;}
.tr p{float:right;line-height:30px;}
.tr *{float:left;}

.zuopin{
	height: 50px;
	line-height: 50px;
	background:#e3eaec;
}
.pingjia_list{
	width: 100%;
	height: 50px;
	border:1px dotted gray;
	box-sizing: border-box;
	margin: 10px 0;
}
.pingjia_list li{
	float: left;
	margin:10px;
}
.pingjia_list a{
	cursor: pointer;
}

.on{
	color: red !important;
	font-weight: bold;
	background: lightblue;
	padding: 5px;	
}
</style>
<link href="../Style/StudentStyle.css" rel="stylesheet" type="text/css" />
<link href="../Script/jBox/Skins/Blue/jbox.css" rel="stylesheet" type="text/css" />
<link href="../Style/ks.css" rel="stylesheet" type="text/css" />


</head>
<body>
    <div class="banner">
        <div class="bgh">
            <div class="page">
                <div class="topxx">
                   
                    <a href="../User/Account/ChangePasswd.aspx.html">密码修改</a> <a onclick="location.href='../../loginb.html'" style="cursor: pointer;">安全退出</a>
                </div>
                <div class="blog_nav">
                    <ul>
                        <li><a href="../Index.html"> 个人中心</a></li><!--我的信息 -->
                        <li><a href="../EducationCenter/Score.aspx.html">我的课程</a></li><!--教务中心-->
                        <li><a href="../evaluate/evaluateme.php">我的评价</a></li><!--我的学费-->
                        <li><a href="../MyAccount/liuyanban.html">留言板</a></li><!--资料中心-->
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
                            <a href="../MyInfo/Index.aspx.html">我的信息</a></div>
                        <div>
                            <a href="../MyInfo/ClassInfo.aspx.html">班级信息 </a>
                        </div>
                        <div>
                            <a href="../User/StudentInfor/Letter.aspx.html">短信息</a></div>
                        <div>
                            <a href="../User/StudentInfor/systemMsge.aspx.php">通知</a></div>
                        <div>
                            <a href="../MyInfo/Objection.aspx.html">我的作品</a></div>
                    </div>
                    <div class="ta1">
                        <strong>课程中心</strong>
                        <div class="leftbgbt2">
                        </div>
                    </div>
                    <div class="cdlist">
                        <div>
                            <a href="../EducationCenter/Application.aspx.html">我的课程</a></div>
                        <div>
                            <a href="../EducationCenter/Score.aspx.html">章节测试</a></div>
                        <div>
                            <a href="../EducationCenter/Book.aspx.html">我的成绩</a></div>
                        <div><a href="../OnlineTeaching/StudentMaterial.aspx.html">资料下载</a></div>
                    </div>
                    <div class="ta1">
                        <strong>评价中心</strong><div class="leftbgbt2">
                        </div>
                    </div>
                    <div class="cdlist">
                        <div>
                            <a href="../evaluate/EvaluateTable.html">表现性评价量表</a></div>
                        <div>
                            <a href="../evaluate/evaluateme.php">作品评价</a></div>
                    </div>
                   
                    <div class="ta1">
                        <strong>留言中心</strong><div class="leftbgbt2">
                        </div>
                    </div>
                    <div class="cdlist">
                        <div>
                            <a href="../historyinfo/historyinfo.html">历史留言信息</a></div>
                    </div>
<div class="ta1">
                        <a href="http://eip.imnu.edu.cn/EIP/" target="_blank"><strong>教学系统</strong></a>
                        <div class="leftbgbt2">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="rightbox">
                
    <h2 class="mbx">
        评价中心 &gt; 我的评价</h2>
    <div class="morebt">
        <ul>
             <li><a class="tab1" href="evaluateme.php">我的评价</a></li>
             <li><a class="tab2" href="otherlist.html">小组评价</a></li>
        </ul>
    </div>
    <div class="pingjia_list">
        <ul>
             <li><a class="pingjia1 on">第一章</a></li>
             <li><a class="pingjia1">第二章</a></li>
             <li><a class="pingjia1">第三章</a></li>
             <li><a class="pingjia1">第四章</a></li>
             <li><a class="pingjia1">第五章</a></li>
             <li><a class="pingjia1">第六章</a></li>
             <li><a class="pingjia1">第七章</a></li>
        </ul>
    </div>
    <!--留言板-->
    <div id="msgBox"  class="msbox" style="display: block;">
    <div class="zuopin">
    	<table>
    		<tr>
                <td><img src='../Images/FileIco/doc.gif' /></td>
                    <td class="xxleft">
                       第一章中学信息技术课程教学设计概论
                    </td>
                    
                    <td>
                        <a href="http://admin.zk0731.com/StudentData/201309/19b4ca24-e7a2-48f0-9ee6-7808631b5c23.doc" target="_blank">
                            <img src="../Images/down.gif" alt="点击下载查看" /></a>
                            
                    </td>
                </tr>
    	</table>
    </div>
    <div class="list">
        <h3><span>组内成员评价</span></h3>
        <ul>
            <?php
                foreach ($rows as $row){
                ?><li>
                    <div class="content">
                        <div class="userName"><a href="../User/StudentInfor/Letter.aspx.html"><?php echo $row['user'];?></a>:</div>
                        <div class="msgInfo"><?php echo $row['content'];?></div>
                        <div class="times"><span><?php date_default_timezone_set('Etc/GMT-8'); echo date("Y-m-d H:i:s",$row['intime']);?></span>
                    </div>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </div>	
</div>

    <div id="msgBox" class="msbox">
    <div class="zuopin">
    	<table>
    		<tr>
                <td><img src='../Images/FileIco/doc.gif' /></td>
                    <td class="xxleft">
                      第二章中学信息技术课程学习者分析
                    </td>
                    
                    <td>
                        <a href="http://admin.zk0731.com/StudentData/201309/19b4ca24-e7a2-48f0-9ee6-7808631b5c23.doc" target="_blank">
                            <img src="../Images/down.gif" alt="点击下载查看" /></a>
                            
                    </td>
                </tr>
    	</table>
    </div>
    <div class="list">
        <h3><span>组内成员评价</span></h3>
        <ul>
            <?php
                foreach ($rows as $row){
                ?><li>
                    <div class="content">
                        <div class="userName"><a href="../User/StudentInfor/Letter.aspx.html"><?php echo $row['user'];?></a>:</div>
                        <div class="msgInfo"><?php echo $row['content'];?></div>
                        <div class="times"><span><?php date_default_timezone_set('Etc/GMT-8'); echo date("Y-m-d H:i:s",$row['intime']);?></span>
                    </div>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </div>	
</div>

    <div id="msgBox"  class="msbox">
    <div class="zuopin">
    	<table>
    		<tr>
                <td><img src='../Images/FileIco/doc.gif' /></td>
                    <td class="xxleft">
                       第三章中学信息技术课程教学目标的编写
                    </td>
                    
                    <td>
                        <a href="http://admin.zk0731.com/StudentData/201309/19b4ca24-e7a2-48f0-9ee6-7808631b5c23.doc" target="_blank">
                            <img src="../Images/down.gif" alt="点击下载查看" /></a>
                            
                    </td>
                </tr>
    	</table>
    </div>
    <div class="list">
        <h3><span>组内成员评价</span></h3>
        <ul>
            <?php
                foreach ($rows as $row){
                ?><li>
                    <div class="content">
                        <div class="userName"><a href="../User/StudentInfor/Letter.aspx.html"><?php echo $row['user'];?></a>:</div>
                        <div class="msgInfo"><?php echo $row['content'];?></div>
                        <div class="times"><span><?php date_default_timezone_set('Etc/GMT-8'); echo date("Y-m-d H:i:s",$row['intime']);?></span>
                    </div>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </div>	
</div>

    <div id="msgBox"  class="msbox">
    <div class="zuopin">
    	<table>
    		<tr>
                <td><img src='../Images/FileIco/doc.gif' /></td>
                    <td class="xxleft">
                     第四章中学信息技术课程教学内容分析
                    </td>
                    
                    <td>
                        <a href="http://admin.zk0731.com/StudentData/201309/19b4ca24-e7a2-48f0-9ee6-7808631b5c23.doc" target="_blank">
                            <img src="../Images/down.gif" alt="点击下载查看" /></a>
                            
                    </td>
                </tr>
    	</table>
    </div>
    <div class="list">
        <h3><span>组内成员评价</span></h3>
        <ul>
            <?php
                foreach ($rows as $row){
                ?><li>
                    <div class="content">
                        <div class="userName"><a href="../User/StudentInfor/Letter.aspx.html"><?php echo $row['user'];?></a>:</div>
                        <div class="msgInfo"><?php echo $row['content'];?></div>
                        <div class="times"><span><?php date_default_timezone_set('Etc/GMT-8'); echo date("Y-m-d H:i:s",$row['intime']);?></span>
                    </div>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </div>	
</div>

    <div id="msgBox"  class="msbox">
    <div class="zuopin">
    	<table>
    		<tr>
                <td><img src='../Images/FileIco/doc.gif' /></td>
                    <td class="xxleft">
                       第五章中学信息技术课程教学方法的选择
                    </td>
                    
                    <td>
                        <a href="http://admin.zk0731.com/StudentData/201309/19b4ca24-e7a2-48f0-9ee6-7808631b5c23.doc" target="_blank">
                            <img src="../Images/down.gif" alt="点击下载查看" /></a>
                            
                    </td>
                </tr>
    	</table>
    </div>
    <div class="list">
        <h3><span>组内成员评价</span></h3>
        <ul>
            <?php
                foreach ($rows as $row){
                ?><li>
                    <div class="content">
                        <div class="userName"><a href="../User/StudentInfor/Letter.aspx.html"><?php echo $row['user'];?></a>:</div>
                        <div class="msgInfo"><?php echo $row['content'];?></div>
                        <div class="times"><span><?php date_default_timezone_set('Etc/GMT-8'); echo date("Y-m-d H:i:s",$row['intime']);?></span>
                    </div>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </div>	
</div>

    <div id="msgBox"  class="msbox">
    <div class="zuopin">
    	<table>
    		<tr>
                <td><img src='../Images/FileIco/doc.gif' /></td>
                    <td class="xxleft">
                       第六章中学信息技术课程教学评价
                    </td>
                    
                    <td>
                        <a href="http://admin.zk0731.com/StudentData/201309/19b4ca24-e7a2-48f0-9ee6-7808631b5c23.doc" target="_blank">
                            <img src="../Images/down.gif" alt="点击下载查看" /></a>
                            
                    </td>
                </tr>
    	</table>
    </div>
    <div class="list">
        <h3><span>组内成员评价</span></h3>
        <ul>
            <?php
                foreach ($rows as $row){
                ?><li>
                    <div class="content">
                        <div class="userName"><a href="../User/StudentInfor/Letter.aspx.html"><?php echo $row['user'];?></a>:</div>
                        <div class="msgInfo"><?php echo $row['content'];?></div>
                        <div class="times"><span><?php date_default_timezone_set('Etc/GMT-8'); echo date("Y-m-d H:i:s",$row['intime']);?></span>
                    </div>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </div>	
</div>

	<div id="msgBox"   class="msbox">
    <div class="zuopin">
    	<table>
    		<tr>
                <td><img src='../Images/FileIco/doc.gif' /></td>
                    <td class="xxleft">
                     第七章中学信息技术课程资源与校本课程的开发
                    </td>
                    
                    <td>
                        <a href="http://admin.zk0731.com/StudentData/201309/19b4ca24-e7a2-48f0-9ee6-7808631b5c23.doc" target="_blank">
                            <img src="../Images/down.gif" alt="点击下载查看" /></a>
                            
                    </td>
                </tr>
    	</table>
    </div>
    <div class="list">
        <h3><span>组内成员评价</span></h3>
        <ul>
            <?php
                foreach ($rows as $row){
                ?><li>
                    <div class="content">
                        <div class="userName"><a href="../User/StudentInfor/Letter.aspx.html"><?php echo $row['user'];?></a>:</div>
                        <div class="msgInfo"><?php echo $row['content'];?></div>
                        <div class="times"><span><?php date_default_timezone_set('Etc/GMT-8'); echo date("Y-m-d H:i:s",$row['intime']);?></span>
                    </div>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </div>	
</div>

        </div>
        <div class="footer">
            <p>
                &copy;copyright 2018 MTYHF  版权所有</p>
        </div>
    </div>
</body>
<script>
    var aBtn=document.getElementsByClassName('pingjia1');
//	var aDiv=document.getElementById('msgBox');
	var aDiv=document.getElementsByClassName('msbox');
	console.log(aDiv.length)
    for(var i=0;i<aBtn.length;i++){
        aBtn[i].index=i;
        aBtn[i].onclick=function(){
            for(var k=0;k<aBtn.length;k++){//先清空所有的样式
                aBtn[k].className ='pingjia1';
                aDiv[k].style.display ='none';
            }
            //给当前的按钮和div添加样式
            this.className ='pingjia1 on';
            aDiv[this.index].style.display ='block';
        };
    }
</script>
</html>
