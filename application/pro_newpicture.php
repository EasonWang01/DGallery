<?php
/* FileName: pro_newpicture.php
 * Latest Update: 2014.5.31
 * Author: song374561@gmail.com
 * Usage: To process about upload picture.
 * require:
 * * pro_dbms.php;
 */
?>
<?php
  require_once('pro_dbms.php');

  function p_newpicture($aid,$file)
  {
    $filename = $file['name'];
    $filetype = $file['type'];

    $albumdata = p_dbms_albumData($aid);
    //$filename = md5($filename);
    //die($filename);
    /*while (!p_dbms_checkpicname($filename))
    {
      $filename = md5($filename);
    }*/
    $path = $albumdata['albumpath'].'/'.$filename;
    move_uploaded_file($file['tmp_name'],$path);
    p_dbms_newpicture($aid,$filename);
  }
?>
