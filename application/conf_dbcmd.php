<?php
/* FileName: conf_dbcmd.php
 * Latest Update: 2014.5.27
 * Author: song374561@gmail.com
 * Usage: Database command configure.
 * require: none;
 */
?>
<?php
  class dbcmd
  {
    public function login($username)
    {
      return 'SELECT password FROM `dg_user` WHERE username="'.$username.'"';
    }
    public function albums($isLogin)
    {
      if ($isLogin === true)
      {
        return 'SELECT AID, albumname, albumpass, albumpub FROM `dg_album`';
      }
      else
      {
        return 'SELECT AID, albumname, albumpass, albumpub FROM `dg_album` WHERE albumpub=1';
      }
    }
    public function albumData($aid)
    {
      return 'SELECT albumpass, albumpub, albumpath FROM `dg_album` WHERE AID='.$aid;
    }
    public function pictures($aid)
    {
      return 'SELECT PID, picname, picinfo FROM `dg_picture` WHERE pAID='.$aid;
    }
  }
?>
