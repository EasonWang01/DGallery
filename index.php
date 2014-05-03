<?php
	require_once('page/view_all.php');
	error_reporting(E_ALL ^ E_NOTICE);
?>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php show('title');?></title>
	</head>
	<body>
		<header><?php show('header');?></header>
		<footer><?php show('footer');?></footer>
	</body>
</html>