<!DOCTYPE html>
<html class=" js csstransforms3d"><head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>发布测试</title>
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/page.css">
	<!--[if lte IE 8]>
	<link href="css/ie8.css" rel="stylesheet" type="text/css"/>
	<![endif]-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/modernizr.js"></script>
	<script type="text/javascript" src="js/jquery.selectui.js"></script>
	
	<script type="text/javascript" charset="utf-8" src="js/utf8-jsp/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/utf8-jsp/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="js/utf8-jsp/lang/zh-cn/zh-cn.js"></script>
	
	<link rel="stylesheet" type="text/css" href="js/webuploader/webuploader.css">    
    <link rel="stylesheet" type="text/css" href="js/webuploader/demo.css">
	
	<script>
	$(function($) {
		$("select").selectui({
			// 是否自动计算宽度
			autoWidth: true,
			// 是否启用定时器刷新文本和宽度
			interval: true
		});
	});
	</script>
	<!--[if IE]>
	<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
<link href="js/utf8-jsp/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
<script src="js/utf8-jsp/third-party/codemirror/codemirror.js" type="text/javascript" defer></script>
<link rel="stylesheet" type="text/css" href="js/utf8-jsp/third-party/codemirror/codemirror.css">
<script src="js/utf8-jsp/third-party/zeroclipboard/ZeroClipboard.js" type="text/javascript" defer></script></head>

<body style="background: rgb(246, 245, 250);">
	<!--content S-->
	<div class="super-content">
		
		<div class="superCtab">
			<div class="publishArt">
				<h4>发布测试</h4>
				<div class="pubMain">
					<!-- <a href="javascript:history.go(-1)" class="backlistBtn"><i class="ico-back"></i>返回列表</a> -->
					<form action="actiontext.php?action=add" method="post">
						<h5 class="pubtitle">标题</h5>
						<div class="pub-txt-bar">
							<input type="text" class="shuruTxt" name="title">
						</div>
						<h5 class="pubtitle">内容</h5>
						<!-- <div class="pub-area-bar"> -->
							<input type="file" class="shuruTxt" name="myfile">
						<!-- </div> -->
						<h5 class="pubtitle">发布时间</h5>
						<div class="pub-txt-bar">
							<input type="text" class="shuruTxt" name="created_at">
						</div>
						<div class="pub-btn">
							<input type="submit" id="" value="发布测试" class="saveBtn">
						</div>
					</form>
				</div>
			</div>
		
		</div>
		<!--main-->
		
	</div>
	

</body></html>