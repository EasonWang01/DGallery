<?php
	require_once('pro_isLogin.php');
	require_once('conf_menu.php');
	
	function showMenu($item)
	{
		$menu = new menu;
		if (isLogin() === false)
		{
			switch($item)
			{
				case 'word':
					return $menu->login;
				case 'link':
					return $menu->loginLink;
			}
		}
		else
		{
			switch($item)
			{
				case 'word':
					return $menu->logout;
				case 'link':
					return $menu->logoutLink;
			}
		}
	}
?>