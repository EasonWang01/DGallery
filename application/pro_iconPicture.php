<?php
/* FileName: pro_iconPicture.php
 * Latest Update: 2014.5.27
 * Author: song374561@gmail.com
 * Usage: To show icon system html_code.
 * require:
 */
?>
<?php
  require_once('pro_dbms.php');

  function p_iconPicture($aid)
  {
    $pictures = p_dbms_pictures($aid);
    return $pictures;
  }
?>
