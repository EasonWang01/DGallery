<?php
/* FileName: pro_delAlbum.php
 * Latest Update: 2014.5.30
 * Author: song374561@gmail.com
 * Usage: To Delete an album.
 * require:
 * * pro_dbms.php;
 * * pro_rmdir.php;
 */
?>
<?php
  require_once('pro_dbms.php');
  require_once('pro_rmdir.php');

  function p_delalbum($aid)
  {
    $data = p_dbms_albumData($aid);
    $path = $data['albumpath'];
    p_rmdir($aid);
    p_dbms_delalbum($aid);
  }
?>
