<?php
/* FileName: DG_newalbum.php
* Latest Update: 2014.6.2
* Author: song374561@gmail.com
* Usage: To create an album.
* require:
* * pro_isLogin.php;
* * pro_newalbum.php;
*/
?>
<?php
  require_once('application/pro_isLogin.php');
  require_once('application/pro_newalbum.php');
  if (isLogin() === true)
  {
    if (mb_detect_encoding($_POST['albumname']) === 'UTF-8' || mb_detect_encoding($_POST['albumname']) === 'ASCII')
    {
      p_newalbum($_POST['albumname'], $_POST['albumset'], $_POST['albumpass']);
      header('Location: index.php');
    }
    else
    {
      echo ('<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤</a></div>');
    }
  }
  else
  {
    echo ('<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤</a></div>');
  }
?>
