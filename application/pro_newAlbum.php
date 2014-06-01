<?php
/* FileName: pro_newalbum.php
 * Latest Update: 2014.5.30
 * Author: song374561@gmail.com
 * Usage: To Create an album.
 * require:
 * * pro_dbms.php;
 * * pro_mkdir.php;
 */
?>
<?php
  require_once('pro_dbms.php');
  require_once('pro_mkdir.php');
  function p_newalbum($albumname, $albumset, $albumpass)
  {
    if ($albumset === 'public')
    {
      $data = p_dbms_newalbum($albumname, 'album/$'.md5($albumname), 1, null);
    }
    else if ($albumset === 'encrypt')
    {
      $data = p_dbms_newalbum($albumname, 'album/$'.md5($albumname), 1, strtoupper(sha1($albumpass)));
    }
    else if ($albumset === 'private')
    {
      $data = p_dbms_newalbum($albumname, 'album/$'.md5($albumname), 0, null);
    }
    p_mkdir($data['AID']);
  }
?>
