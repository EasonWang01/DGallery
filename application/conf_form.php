<?php
/* FileName: conf_form.php
 * Latest Update: 2014.5.15
 * Author: song374561@gmail.com
 * Usage: Define form element.
 * require: none;
 */
?>
<?php
  class form
  {
    public $page = 'DG_user.php';
    public $closeIcon = '<a href="javascript:void(0)" onclick="form()"><img src="system/image/close.png"></a>';
    public $usernameArea = '<div class="inputLoc">帳號：<input type="text" name="username"/></div>';
    public $passwordArea = '<div class="inputLoc">密碼：<input type="password" name="password"/></div>';
    public $loginSubmit = '<div class="inputLoc"><input class="submit" type="submit" value"登入"/></div>';
    public $logoutMessage = '<div class="inputLoc">確定要登出？</div>';
    public $logoutSubmit = '<div class="inputLoc"><a href="DG_user.php"><button class="submit" type="button">登出</button></a></div>';
  }
?>
