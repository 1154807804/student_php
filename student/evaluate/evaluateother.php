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
	display: none;
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
#msgBox .list h3{position:relative;height:33px;font-size:14px;font-weight:400;background:#e3eaec;border:1px solid #dee4e7;}
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
	margin-bottom: 20px;
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
<script type="text/javascript">
/*-------------------------- +
  获取id, class, tagName
 +-------------------------- */
var get = {
	byId: function(id) {
		return typeof id === "string" ? document.getElementById(id) : id
	},
	byClass: function(sClass, oParent) {
		var aClass = [];
		var reClass = new RegExp("(^| )" + sClass + "( |$)");
		var aElem = this.byTagName("*", oParent);
		for (var i = 0; i < aElem.length; i++) reClass.test(aElem[i].className) && aClass.push(aElem[i]);
		return aClass
	},
	byTagName: function(elem, obj) {
		return (obj || document).getElementsByTagName(elem)
	}
};
/*-------------------------- +
  事件绑定, 删除
 +-------------------------- */
var EventUtil = {
	addHandler: function (oElement, sEvent, fnHandler) {
		oElement.addEventListener ? oElement.addEventListener(sEvent, fnHandler, false) : (oElement["_" + sEvent + fnHandler] = fnHandler, oElement[sEvent + fnHandler] = function () {oElement["_" + sEvent + fnHandler]()}, oElement.attachEvent("on" + sEvent, oElement[sEvent + fnHandler]))
	},
	removeHandler: function (oElement, sEvent, fnHandler) {
		oElement.removeEventListener ? oElement.removeEventListener(sEvent, fnHandler, false) : oElement.detachEvent("on" + sEvent, oElement[sEvent + fnHandler])
	},
	addLoadHandler: function (fnHandler) {
		this.addHandler(window, "load", fnHandler)
	}
};
/*-------------------------- +
  设置css样式
  读取css样式
 +-------------------------- */
function css(obj, attr, value)
{
	switch (arguments.length)
	{
		case 2:
			if(typeof arguments[1] == "object")
			{	
				for (var i in attr) i == "opacity" ? (obj.style["filter"] = "alpha(opacity=" + attr[i] + ")", obj.style[i] = attr[i] / 100) : obj.style[i] = attr[i];
			}
			else
			{	
				return obj.currentStyle ? obj.currentStyle[attr] : getComputedStyle(obj, null)[attr]
			}
			break;
		case 3:
			attr == "opacity" ? (obj.style["filter"] = "alpha(opacity=" + value + ")", obj.style[attr] = value / 100) : obj.style[attr] = value;
			break;
	}
};

EventUtil.addLoadHandler(function ()
{
	var oMsgBox = get.byId("msgBox");
	var oUserName = get.byId("userName");
	var oConBox = get.byId("conBox");
	var oSendBtn = get.byId("sendBtn");
	var oMaxNum = get.byClass("maxNum")[0];
	var oCountTxt = get.byClass("countTxt")[0];
	var oList = get.byClass("list")[0];
	var oUl = get.byTagName("ul", oList)[0];
	var aLi = get.byTagName("li", oList);
	var aFtxt = get.byClass("f-text", oMsgBox);
	var aImg = get.byTagName("img", get.byId("face"));
	var bSend = false;
	var timer = null;
	var oTmp = "";
	var i = 0;
	var maxNum = 140;
	
	//禁止表单提交
	EventUtil.addHandler(get.byTagName("form", oMsgBox)[0], "submit", function () {return false});
	
	//为广播按钮绑定发送事件
	EventUtil.addHandler(oSendBtn, "click", fnSend);
	
	//为Ctrl+Enter快捷键绑定发送事件
	EventUtil.addHandler(document, "keyup", function(event)
	{
		var event = event || window.event;
		event.ctrlKey && event.keyCode == 13 && fnSend()
	});
	
	//发送广播函数
	function fnSend ()
	{
		var reg = /^\s*$/g;
		if(reg.test(oUserName.value))
		{
			alert("\u8bf7\u586b\u5199\u60a8\u7684\u59d3\u540d");
			oUserName.focus()
		}
		else if(!/^[u4e00-\u9fa5\w]{2,8}$/g.test(oUserName.value))
		{
			alert("\u59d3\u540d\u75312-8\u4f4d\u5b57\u6bcd\u3001\u6570\u5b57\u3001\u4e0b\u5212\u7ebf\u3001\u6c49\u5b57\u7ec4\u6210\uff01");
			oUserName.focus()
		}
		else if(reg.test(oConBox.value))
		{
			alert("\u968f\u4fbf\u8bf4\u70b9\u4ec0\u4e48\u5427\uff01");
			oConBox.focus()
		}
		else if(!bSend)
		{
			alert("\u4f60\u8f93\u5165\u7684\u5185\u5bb9\u5df2\u8d85\u51fa\u9650\u5236\uff0c\u8bf7\u68c0\u67e5\uff01");
			oConBox.focus()
		}
		else
		{
			var oLi = document.createElement("li");
			var oDate = new Date();
			oLi.innerHTML = "<div class=\"userPic\"><img src=\"" + get.byClass("current", get.byId("face"))[0].src + "\"></div>\
							 <div class=\"content\">\
							 	<div class=\"userName\"><a href=\"javascript:;\">" + oUserName.value + "</a>:</div>\
								<div class=\"msgInfo\">" + oConBox.value.replace(/<[^>]*>|&nbsp;/ig, "") + "</div>\
								<div class=\"times\"><span>" + format(oDate.getMonth() + 1) + "\u6708" + format(oDate.getDate()) + "\u65e5 " + format(oDate.getHours()) + ":" + format(oDate.getMinutes()) + "</span><a class=\"del\" href=\"javascript:;\">\u5220\u9664</a></div>\
							 </div>";
			//插入元素
			aLi.length ? oUl.insertBefore(oLi, aLi[0]) : oUl.appendChild(oLi);
			
			//重置表单
			get.byTagName("form", oMsgBox)[0].reset();
			for (i = 0; i < aImg.length; i++) aImg[i].className = "";
			aImg[0].className = "current";
			
			//将元素高度保存
			var iHeight = oLi.clientHeight - parseFloat(css(oLi, "paddingTop")) - parseFloat(css(oLi, "paddingBottom"));
			var alpah = count = 0;
			css(oLi, {"opacity" : "0", "height" : "0"});	
			timer = setInterval(function ()
			{
				css(oLi, {"display" : "block", "opacity" : "0", "height" : (count += 8) + "px"});
				if (count > iHeight)
				{
					clearInterval(timer);
					css(oLi, "height", iHeight + "px");
					timer = setInterval(function ()
					{
						css(oLi, "opacity", (alpah += 10));
						alpah > 100 && (clearInterval(timer), css(oLi, "opacity", 100))
					},30)
				}
			},30);
			//调用鼠标划过/离开样式
			liHover();
			//调用删除函数
			delLi()
		}
	};
	
	//事件绑定, 判断字符输入
	EventUtil.addHandler(oConBox, "keyup", confine);	
	EventUtil.addHandler(oConBox, "focus", confine);
	EventUtil.addHandler(oConBox, "change", confine);
	
	//输入字符限制
	function confine ()
	{
		var iLen = 0;		
		for (i = 0; i < oConBox.value.length; i++) iLen += /[^\x00-\xff]/g.test(oConBox.value.charAt(i)) ? 1 : 0.5;
		oMaxNum.innerHTML = Math.abs(maxNum - Math.floor(iLen));	
		maxNum - Math.floor(iLen) >= 0 ? (css(oMaxNum, "color", ""), oCountTxt.innerHTML = "\u8fd8\u80fd\u8f93\u5165", bSend = true) : (css(oMaxNum, "color", "#f60"), oCountTxt.innerHTML = "\u5df2\u8d85\u51fa", bSend = false)
	}
	//加载即调用
	confine();		
	
	//广播按钮鼠标划过样式
	EventUtil.addHandler(oSendBtn, "mouseover", function () {this.className = "hover"});

	//广播按钮鼠标离开样式
	EventUtil.addHandler(oSendBtn, "mouseout", function () {this.className = ""});
</script>

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
        评价中心&gt; 小组评价</h2>
    <div class="morebt">
        <ul>
             <li><a class="tab2" onclick="" href="evaluateme.php">我的评价</a> </li>
    			<li><a class="tab1" onclick="" href="otherlist.html">小组评价</a></li>
        </ul>
    </div>
    <!--引入留言板-->
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
    
    <div id="msgBox" class="msbox" style="display: block;">
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
    <form action="save.php" method="post">
        <h2>发表你的观点，大家一起进步吧</h2>
        <div>
            <input id="userName" class="f-text" name="user" />
        </div>
        <div><textarea id="conBox" class="f-text" name="content"></textarea></div>
        <div class="tr">
            <p>
                <span class="countTxt">还能输入</span><strong class="maxNum">140</strong><span>个字</span>
                <input id="sendBtn" type="submit" title="快捷键 Ctrl+Enter" value="" />
            </p>
        </div>
    </form>
    <div class="list">
        <h3><span>大家在说</span></h3>
        <ul>
        	<?php
		foreach ($rows as $row){
		?>
            <li>
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
    <form action="save.php" method="post">
        <h2>学习上的困难，大家一起探讨吧</h2>
        <div>
            <input id="userName" class="f-text" name="user" />
        </div>
        <div><textarea id="conBox" class="f-text" name="content"></textarea></div>
        <div class="tr">
            <p>
                <span class="countTxt">还能输入</span><strong class="maxNum">140</strong><span>个字</span>
                <input id="sendBtn" type="submit" title="快捷键 Ctrl+Enter" value="" />
            </p>
        </div>
    </form>
    <div class="list">
        <h3><span>大家在说</span></h3>
        <ul>
        	<?php
		foreach ($rows as $row){
		?>
            <li>
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
                       第三章
中学信息技术课程教学目标的编写
                    </td>
                    
                    <td>
                        <a href="http://admin.zk0731.com/StudentData/201309/19b4ca24-e7a2-48f0-9ee6-7808631b5c23.doc" target="_blank">
                            <img src="../Images/down.gif" alt="点击下载查看" /></a>
                            
                    </td>
                </tr>
    	</table>
    </div>
    <form action="save.php" method="post">
        <h2>发表你的观点，大家一起进步吧</h2>
        <div>
            <input id="userName" class="f-text" name="user" />
        </div>
        <div><textarea id="conBox" class="f-text" name="content"></textarea></div>
        <div class="tr">
            <p>
                <span class="countTxt">还能输入</span><strong class="maxNum">140</strong><span>个字</span>
                <input id="sendBtn" type="submit" title="快捷键 Ctrl+Enter" value="" />
            </p>
        </div>
    </form>
    <div class="list">
        <h3><span>大家在说</span></h3>
        <ul>
        	<?php
		foreach ($rows as $row){
		?>
            <li>
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
                     第四章
中学信息技术课程教学内容分析
                    </td>
                    
                    <td>
                        <a href="http://admin.zk0731.com/StudentData/201309/19b4ca24-e7a2-48f0-9ee6-7808631b5c23.doc" target="_blank">
                            <img src="../Images/down.gif" alt="点击下载查看" /></a>
                            
                    </td>
                </tr>
    	</table>
    </div>
    <form action="save.php" method="post">
        <h2>发表你的观点，大家一起进步吧</h2>
        <div>
            <input id="userName" class="f-text" name="user" />
        </div>
        <div><textarea id="conBox" class="f-text" name="content"></textarea></div>
        <div class="tr">
            <p>
                <span class="countTxt">还能输入</span><strong class="maxNum">140</strong><span>个字</span>
                <input id="sendBtn" type="submit" title="快捷键 Ctrl+Enter" value="" />
            </p>
        </div>
    </form>
    <div class="list">
        <h3><span>大家在说</span></h3>
        <ul>
        	<?php
		foreach ($rows as $row){
		?>
            <li>
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
                       第五章
中学信息技术课程教学方法的选择
                    </td>
                    
                    <td>
                        <a href="http://admin.zk0731.com/StudentData/201309/19b4ca24-e7a2-48f0-9ee6-7808631b5c23.doc" target="_blank">
                            <img src="../Images/down.gif" alt="点击下载查看" /></a>
                            
                    </td>
                </tr>
    	</table>
    </div>
    <form action="save.php" method="post">
        <h2>发表你的观点，大家一起进步吧</h2>
        <div>
            <input id="userName" class="f-text" name="user" />
        </div>
        <div><textarea id="conBox" class="f-text" name="content"></textarea></div>
        <div class="tr">
            <p>
                <span class="countTxt">还能输入</span><strong class="maxNum">140</strong><span>个字</span>
                <input id="sendBtn" type="submit" title="快捷键 Ctrl+Enter" value="" />
            </p>
        </div>
    </form>
    <div class="list">
        <h3><span>大家在说</span></h3>
        <ul>
        	<?php
		foreach ($rows as $row){
		?>
            <li>
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
                       第六章
中学信息技术课程教学评价
                    </td>
                    
                    <td>
                        <a href="http://admin.zk0731.com/StudentData/201309/19b4ca24-e7a2-48f0-9ee6-7808631b5c23.doc" target="_blank">
                            <img src="../Images/down.gif" alt="点击下载查看" /></a>
                            
                    </td>
                </tr>
    	</table>
    </div>
    <form action="save.php" method="post">
        <h2>发表你的观点，大家一起进步吧</h2>
        <div>
            <input id="userName" class="f-text" name="user" />
        </div>
        <div><textarea id="conBox" class="f-text" name="content"></textarea></div>
        <div class="tr">
            <p>
                <span class="countTxt">还能输入</span><strong class="maxNum">140</strong><span>个字</span>
                <input id="sendBtn" type="submit" title="快捷键 Ctrl+Enter" value="" />
            </p>
        </div>
    </form>
    <div class="list">
        <h3><span>大家在说</span></h3>
        <ul>
        	<?php
		foreach ($rows as $row){
		?>
            <li>
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
                     第七章
中学信息技术课程资源与校本课程的开发
                    </td>
                    
                    <td>
                        <a href="http://admin.zk0731.com/StudentData/201309/19b4ca24-e7a2-48f0-9ee6-7808631b5c23.doc" target="_blank">
                            <img src="../Images/down.gif" alt="点击下载查看" /></a>
                            
                    </td>
                </tr>
    	</table>
    </div>
    <form action="save.php" method="post">
        <h2>发表你的观点，大家一起进步吧</h2>
        <div>
            <input id="userName" class="f-text" name="user" />
        </div>
        <div><textarea id="conBox" class="f-text" name="content"></textarea></div>
        <div class="tr">
            <p>
                <span class="countTxt">还能输入</span><strong class="maxNum">140</strong><span>个字</span>
                <input id="sendBtn" type="submit" title="快捷键 Ctrl+Enter" value="" />
            </p>
        </div>
    </form>
    <div class="list">
        <h3><span>大家在说</span></h3>
        <ul>
        	<?php
		foreach ($rows as $row){
		?>
            <li>
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
</body>
</html>
