<?php
	session_start();
	function isLogin()
	{
		if($_SESSION['user'] === true)
			return true;
		else
			return false;
	}
?>