<?php
/* FileName: pro_dragevent.php
 * Latest Update: 2014.5.31
 * Author: song374561@gmail.com
 * Usage: To show first page for visitor.
 * require:
 * * pro_dbms.php;
 * * pro_isLogin.php;
 */
?>
<?php
  require_once('pro_dbms.php');
  require_once('pro_isLogin.php');

  function p_dragevent($aid)
  {
    if ($aid === 0)
    {
      return p_dbms_albums(isLogin());
    }
    else
    {
      $albumData = p_dbms_albumData($aid);
      //echo('alert("'.$albumData['albumpub'].'")');
      if ($albumData === 0)
      {
        return 0;
      }
      if ($albumData['albumpub'] === '1')
      {
        return p_dbms_pictures($aid);
      }
      else if ($albumData['albumpub'] === '0' && isLogin() === true)
      {
        return p_dbms_pictures($aid);
      }
      else
      {
        return 0;
      }
    }
  }
?>
