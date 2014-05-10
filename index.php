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
		<script>

		</script>
	</head>
	<body>
		<header>
				<a href="<?php echo(showInfo('headerLink'));?>">
					<?php echo(showInfo('header'));?>
				</a>
		</header>
		<div id="menu">
			<ul>
				<li>
					<a href="/dgallery">首頁</a>
				</li>
				<li>
					<a href="<?php echo(showMenu('link'));?>" onclick="showLoginForm()"><?php echo(showMenu('word'));?></a>
				</li>
			</ul>
		</div>
		<div id="slideshow">
			<a href="javascript:void(0)" onclick="showPic"><img src="album/egpub/1.jpg"></a>
		</div>
		<div id="folderarea">
		</div>
		<footer><a href="<?php echo(showInfo('footerLink'));?>"><?php echo(showInfo('footer'));?></a></footer>
		<?php showForm();?>
		<div id="fancy_background" style="display:none; background-color: rgb(102, 102, 102); opacity: 0.3"></div>
		<div id="picframes" style="display:none;"></div>
		<script>
			function showLoginForm()
			{
				if(!window.isShow)
				{
					$(".form").css('display','block');
					changeFancybox();
					isShow=1;
				}
				else
				{
					$(".form").css('display','none');
					changeFancybox();
					delete isShow;
				}
			}
			function changeFancybox()
			{
				if($("#fancy_background").css('display') == 'none')
					$("#fancy_background").css('display','block');
				else
					$("#fancy_background").css('display','none');
			}
			function showFolder(aid)
			{
				$.ajax(
				{
					type: 'POST',
					dataType: 'html',
					data: {albumId: aid},
					url: 'explorer.php',
					success: function(data)
					{
						document.getElementById('folderarea').innerHTML=data;
					},
					error: function(data)
					{
						alert('獲取失敗');
					},
				});
			}
		$(document).ready(showFolder(0));
		</script>
	</body>
</html>