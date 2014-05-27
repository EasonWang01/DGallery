<?php
/* FileName: pro_iconFolder.php
 * Latest Update: 2014.5.27
 * Author: song374561@gmail.com
 * Usage: To show icon system html_code.
 * require:
 * * pro_isLogin.php
 * * pro_dbms.php
 */
?>
<?php
  require_once('pro_isLogin.php');
  require_once('pro_dbms.php');

  function p_iconFolder()
  {
    if (isLogin() === true)
    {
      $albums = p_dbms_albums(true);
      return $albums;
    }
    else
    {
      $albums = p_dbms_albums(false);
      return $albums;
    }
  }
?>
