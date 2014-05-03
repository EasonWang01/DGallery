<?php
	require_once('page/view_galleryinfo.php');
	require_once('page/view_menu.php');
	require_once('page/view_form.php');
	error_reporting(E_ALL ^ E_NOTICE);
?>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo(showInfo('title'));?></title>
		<link href="system/css/global.css" type="text/css" rel="stylesheet">
		<link href="system/css/index.css" type="text/css" rel="stylesheet">
		<script src="system/js/jquery-1.11.0.js"></script>
	</head>
	<body>
		<div class="debug"><pre><?php print_r($_SESSION);?></pre></div>
		<header><a href="<?php echo(showInfo('headerLink'));?>"><?php echo(showInfo('header'));?></a></header>
		<div id="menu">
			<ul>
				<li>
					<a href="/dgallery">首頁</a>
				</li>
				<li>
					<a href="<?php echo showMenu('link');?>" onclick="showForm()"><?php echo showMenu('word');?></a>
				</li>
			</ul>
		</div>
		<footer><a href="<?php echo(showInfo('footerLink'));?>"><?php echo(showInfo('footer'));?></a></footer>
		<?php showForm();?>
		<div id="fancy_background" style="display:none; background-color: rgb(102, 102, 102); opacity: 0.3"></div>
		<script>
			function showForm()
			{
				if(!window.loginLeft)
				{
					$("#login").css('display','block');
					changeFancybox();
					loginLeft=$("#login").css('left');
					$("#login").css('left',parseInt(loginLeft)-125+'px');
				}
				else
				{
					$("#login").css('display','none');
					changeFancybox();
					$("#login").css('left','50%');
					delete loginLeft;
				}
			}
			function changeFancybox()
			{
				if($("#fancy_background").css('display') == 'none')
					$("#fancy_background").css('display','block');
				else
					$("#fancy_background").css('display','none');
			}
		</script>
	</body>
</html>