<?php
/* FileName: pro_delpicture.php
 * Latest Update: 2014.5.30
 * Author: song374561@gmail.com
 * Usage: To Delete a picture.
 * require:
 * * pro_dbms.php;
 * * pro_rmfile.php;
 */
?>
<?php
  require_once('pro_dbms.php');
  require_once('pro_rmfile.php');

  function p_delpicture($pid)
  {
    $albumPath = p_dbms_picpath($pid);
    $picData = p_dbms_picData($pid);

    $picPath = $albumPath['albumpath'].'/'.$picData['picname'];
    p_rmfile($picPath);

    p_dbms_delpicture($pid);
  }
?>
