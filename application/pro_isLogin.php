<?php
/* FileName: pro_isLogin.php
 * Latest Update: 2014.5.15
 * Author: song374561@gmail.com
 * Usage: To check has user logined.
 * require: none;
 */
?>
<?php
  session_start();
  function isLogin()
  {
    if ($_SESSION['user']===true)
      return true;
    else
      return false;
  }
?>
