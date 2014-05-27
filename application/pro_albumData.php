<?php
/* FileName: pro_albumData.php
 * Latest Update: 2014.5.27
 * Author: song374561@gmail.com
 * Usage: To get albums information.
 * require:
 * * pro_dbms.php;
 */
?>
<?php
  require_once('pro_dbms.php');
  function p_albumData($aid)
  {

    $albumData = p_dbms_albumData($aid);
    if ($albumData === 0)
      return array(1=>-1);
    if ($albumData['albumpass']===null && $albumData['albumpub']==='1')
    {
      return array(1=>1,'albumpath'=>$albumData['albumpath']);
    }
    else if ($albumData['albumpass'] !== null && $albumData['albumpub']==='1')
    {
      return array(1=>2,'albumpath'=>$albumData['albumpath']);
    }
    else if ($albumData['albumpass'] === null && $albumData['albumpub'] === '0')
    {
      return array(1=>3,'albumpath'=>$albumData['albumpath']);
    }
  }
?>
