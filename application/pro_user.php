<?php
/* FileName: pro_user.php
 * Latest Update: 2014.5.20
 * Author: song374561@gmail.com
 * Usage: Login/Logout Processor.
 * require:
 * * pro_dbms.php
 */
?>
<?
  require_once('pro_dbms.php');
  session_start();

  function p_user($init,$username,$password)
  {
    if ($init === 'logout')
    {
      session_destroy();
    }
    else
    {
      p_dbms_login($username,strtoupper(sha1($password)));
    }
  }
?>
