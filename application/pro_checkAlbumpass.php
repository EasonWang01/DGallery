<?php
/* FileName: pro_checkAlbumpass.php
 * Latest Update: 2014.5.27
 * Author: song374561@gmail.com
 * Usage: Check album pass.
 * require:
 * * pro_dbms.php;
 */
?>
<?php
  require_once('pro_dbms.php');

  function p_checkAlbumpass($aid, $albumpass)
  {
    $realpass = p_dbms_albumpass($aid);
    if ($albumpass === $realpass['albumpass'])
      return true;
    else
      return false;
  }
?>
