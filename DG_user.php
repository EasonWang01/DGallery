<?php
/* FileName: DG_user.php
 * Latest Update: 2014.5.19
 * Author: song374561@gmail.com
 * Usage: Login/Logout Processor.
 * require:
 * * pro_isLogin.php
 * * pro_user.php
 */
?>
<?php
  require_once('application/pro_isLogin.php');
  require_once('application/pro_user.php');

  if (isLogin() === true)
  {
    p_user('logout',null,null);
  }
  else
  {
    p_user('login',$_POST['username'],$_POST['password']);
  }
  header('Location: index.php');
?>
