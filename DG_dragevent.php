<?php
/* FileName: DG_dragevent.php
* Latest Update: 2014.6.2
* Author: song374561@gmail.com
* Usage: To delete a picture.
* require:
* * pro_isLogin.php;
* * pro_dragevent.php;
*/
?>
<?php
  require_once('application/pro_isLogin.php');
  require_once('application/view_dragevent.php');

  if (isLogin() === true)
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
  else
  {
    header('content-type:application/javascript');
    echo(null);
  }
?>
