<?php
/* FileName: DG_delpicture.php
* Latest Update: 2014.6.2
* Author: song374561@gmail.com
* Usage: To delete a picture.
* require:
* * pro_isLogin.php;
* * pro_delpicture.php;
*/
?>
<?php
  require_once('application/pro_isLogin.php');
  require_once('application/pro_delpicture.php');
  require_once('application/view_showIcon.php');
  require_once('application/pro_picData.php');

  if (isLogin() === true)
  {
    if (is_numeric($_POST['pid']))
    {
      p_delpicture($_POST['pid']);
      $picData = p_picData($_POST['pid']);
      $aid = $picData['pAID'];
      v_showIcon(p_picData($aid));
    }
    else
    {
      echo ('<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤(alum/picture data type error)</a></div>');
    }
  }
?>
