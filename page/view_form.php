<?php
	require_once('pro_isLogin.php');
	
	function showForm()
	{
		if (isLogin() === false)
			echo('<form id="login" action="member.php" method="POST"><a href="javascript:void(0)" onclick="showForm()"><img src="system/image/closeicon.png"></a><div id="formMargin"><div class="inputLoc">帳號：<input type="text" name="username"/></div><div class="inputLoc">密碼：<input type="password" name="password"/></div><div class="inputLoc"><input class="submit" type="submit" value="登入" /></div></div></form>');
	}
		
?>