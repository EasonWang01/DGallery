<?php
/* FileName: pro_mkdir.php
 * Latest Update: 2014.5.30
 * Author: song374561@gmail.com
 * Usage: To create/delete album folder;
 * require:
 * * pro_dbms.php;
 */
?>
<?php
  require_once('pro_dbms.php');
  function p_mkdir($aid)
  {
    $albumData = p_dbms_albumData($aid);
    if ($albumData!==0)
    {
      $path = $albumData['albumpath'];
      mkdir($path, 0777);
    }
  }
?>
