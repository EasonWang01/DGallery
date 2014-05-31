<?php
/* FileName: pro_delPicture.php
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

  function p_delPicture($pid)
  {
    $albumPath = p_dbms_picpath($pid);
    $picData = p_dbms_picData($pid);
    if (!$albumPath && !$picData)
      echo ('<div id="back"><a href="javascript:void(0)" onclick="loadIcon(0)"><img src="system/image/back.png">回首頁</a></div>');
    else
    {
      $picPath = $albumPath['albumpath'].'/'.$picData['picname'];
      p_rmfile($picPath);
    }


    p_dbms_delpicture($pid);
  }
?>
