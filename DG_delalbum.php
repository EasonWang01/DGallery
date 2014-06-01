<?php
/* FileName: DG_delalbum.php
 * Latest Update: 2014.6.2
 * Author: song374561@gmail.com
 * Usage: To delete an album.
 * require:
 * * pro_delAlbum.php;
 * * pro_isLogin.php;
 */
?>
<?php
  require_once('application/pro_isLogin.php');
  require_once('application/pro_delalbum.php');
  require_once('application/view_showIcon.php');

  if (isLogin() === true)
  {
    if(is_numeric($_POST['aid']))
    {
      p_delalbum($_POST['aid']);
      v_showIcon('root');
    }
    else
    {
      echo ('<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤(album data type error)</a></div>');
    }
  }
?>
