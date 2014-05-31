<?php
/* FileName: conf_loginForm.php
 * Latest Update: 2014.5.30
 * Author: song374561@gmail.com
 * Usage: Define form element.
 * require: none;
 */
?>
<?php
  class loginForm
  {
    public $page = 'DG_user.php';
    public $closeIcon = '<a href="javascript:void(0)" onclick="loginForm()"><img src="system/image/close.png"></a>';
    public $usernameArea = '<div class="inputLoc"><center>帳號：<input type="text" name="username"/></center></div>';
    public $passwordArea = '<div class="inputLoc"><center>密碼：<input type="password" name="password"/></center></div>';
    public $loginSubmit = '<div class="inputLoc"><center><input type="submit" value="登入"/></center></div>';
    public $logoutMessage = '<center>確定要登出？</center>';
    public $logoutSubmit = '<div class="inputLoc"><a href="DG_user.php"><center><button type="button">登出</button></center></a></div>';
    public $loginTitle = '<center>登入系統</center>';
    public $logoutTitle = '<center>登出系統</center>';
  }
?>
