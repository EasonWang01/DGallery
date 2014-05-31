<?php
/* FileName: pro_rmfile.php
 * Latest Update: 2014.5.30
 * Author: song374561@gmail.com
 * Usage: To Delete a picture.
 * require: none;
 */
?>
<?php
  function p_rmfile($path)
  {
    unlink($path);
  }
?>
