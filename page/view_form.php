<?php
	require_once('pro_isLogin.php');
	require_once('conf_loginform.php');
	
	function showForm()
	{
		$form = new form;
		$formStringLogin = '<form class="form" action="'.$form->page.'" method="POST">'.$form->closeIcon.'<div class="formMargin">'.$form->usernameArea.$form->passwordArea.$form->loginSubmit.'</div></form>';
		$formStringLogout = '<form class="form" action"'.$form->page.'">'.$form->closeIcon.'<div class="formMargin">'.$form->logoutMessage.$form->logoutSubmit.'</div></form>';
		if (isLogin() === false)
			echo($formStringLogin);
		else
			echo($formStringLogout);
	}
		
?>