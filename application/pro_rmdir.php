<?php
/* FileName: pro_rmdir.php
 * Latest Update: 2014.5.30
 * Author: song374561@gmail.com
 * Usage: To Delete an album.
 * require:
 * * pro_dbms.php;
 * * pro_rmfile.php;
 */
?>
<?php
  require_once('pro_dbms.php');
  function p_rmdir($aid)
  {
    if ($albumData = p_dbms_albumData($aid))
    {
      if($pictures = p_dbms_pictures($aid))
      {
        foreach($pictures as $p)
        {
          $path = $albumData['albumpath'].'/'.$p['picname'];
          unlink($path);
        }
      }
      rmdir($albumData['albumpath']);
    }
  }
?>
