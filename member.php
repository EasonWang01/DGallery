<?php
	require_once('page/pro_isLogin.php');
	require_once('page/pro_login.php');
	require_once('page/pro_logout.php');
	if(isLogin() === true)
	{
		logout();
	}
	else
	{
		login($_POST['username'],$_POST['password']);
	}
	header('Location: index.php');
?>