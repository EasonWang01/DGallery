<?php
	class form
	{
		public $page = 'member.php';
		public $closeIcon = '<a href="javascript:void(0)" onclick="showLoginForm()"><img src="system/image/closeicon.png"></a>';
		public $usernameArea = '<div class="inputLoc">帳號：<input type="text" name="username"/></div>';
		public $passwordArea = '<div class="inputLoc">密碼：<input type="password" name="password"/></div>';
		public $loginSubmit = '<div class="inputLoc"><input class="submit" type="submit" value="登入" /></div>';
		public $logoutMessage = '<div class="inputLoc">確定要登出？</div>';
		public $logoutSubmit = '<div class="inputLoc"><a href="/dgallery/member.php"><button class="submit" type="button">登出</button></a></div>';
	}
?>