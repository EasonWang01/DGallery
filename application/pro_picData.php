<?php
/* FileName: pro_pictureData.php
 * Latest Update: 2014.6.2
 * Author: song374561@gmail.com
 * Usage: To get albums information.
 * require:
 * * pro_dbms.php;
 */
?>
<?php
  require_once('pro_dbms.php');

  function p_picData($pid)
  {
    return p_dbms_picData($pid);
  }
?>
