<?php
/* FileName: DG_uploader.php
* Latest Update: 2014.6.2
* Author: song374561@gmail.com
* Usage: To upload picture
* require:
* * pro_isLogin.php;
* * pro_newPicture.php;
*/
?>
<?php
  require_once('application/pro_isLogin.php');
  require_once('application/pro_newpicture.php');
  require_once('application/view_showicon.php');
  if (isLogin() === true)
  {
    if (is_numeric($_POST['aid']))
    {
      p_newPicture($_POST['aid'],$_FILES['file']);
      v_showicon($_POST['aid']);
    }
    else
    {
      echo ('<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤2</a></div>');
    }
  }
  else
  {
    echo ('<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤3</a></div>');
  }
?>
