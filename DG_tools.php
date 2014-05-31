<?php
/* FileName: DG_tools.php
 * Latest Update: 2014.5.31
 * Author: song374561@gmail.com
 * Usage: To process every tools (create folder, delete folder, upload picture, delete  picture...etc).
 * require:
 * * pro_isLogin.php;
 */
?>
<?php
  require_once('application/pro_isLogin.php');
  require_once('application/pro_newAlbum.php');
  require_once('application/pro_delAlbum.php');
  require_once('application/view_dragEvent.php');
  require_once('application/pro_delPicture.php');

  if ($_POST['type'] === 'dragevent')
  {
    if(is_numeric($_POST['aid']))
    {
      header('content-type: application/javascript');
      if ($_POST['aid'] <= 0)
        v_dragEvent('root');
      else
        v_dragEvent($_POST['aid']);
    }
  }
  if (isLogin()===true)
  {
    //create album
    if ($_POST['type'] === 'newalbum')
    {
      if (mb_detect_encoding($_POST['albumname']) === 'UTF-8' || mb_detect_encoding($_POST['albumname']) === 'ASCII')
      {
        p_newAlbum($_POST['albumname'], $_POST['albumset'], $_POST['albumpass']);
        header('Location: index.php');
      }
    }
    //delete album
    else if ($_POST['type'] === 'delalbum')
    {
      if(is_numeric($_POST['aid']))
      {
        p_delAlbum($_POST['aid']);
      }
      else
      {
        echo ('<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤2'.$_POST['aid'].'</a></div>');
      }
    }
    //delete picture
    else if ($_POST['type'] === 'delpicture')
    {
      if (is_numeric($_POST['pid']))
      {
        p_delPicture($_POST['pid']);
      }
      else
      {
        echo ('<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤</a></div>');
      }
    }
  }

?>
