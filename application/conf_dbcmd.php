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
    public function albumpass($aid)
    {
      return 'SELECT albumpass FROM `dg_album` WHERE AID='.$aid;
    }
    public function checkPath($albumpath)
    {
      return 'SELECT AID FROM `dg_album` WHERE albumpath="'.$albumpath.'"';
    }
    public function newalbum($albumname, $albumpath, $albumpub, $albumpass,$date)
    {
      if ($albumpass === null)
        return 'INSERT INTO `dg_album` (albumname,albumpath,albumpub,createdate) VALUES("'.$albumname.'","'.$albumpath.'","'.$albumpub.'","'.$date.'")';
      else
        return 'INSERT INTO `dg_album` (albumname,albumpath,albumpub,albumpass,createdate) VALUES("'.$albumname.'","'.$albumpath.'","'.$albumpub.'","'.$albumpass.'","'.$date.'")';
    }
    public function delalbum($aid)
    {
      return 'DELETE FROM `dg_album` WHERE `AID`='.$aid;
    }
    public function picpath($pid)
    {
      return 'SELECT albumpath FROM `dg_album` WHERE `AID`=(SELECT `pAID` FROM `dg_picture` WHERE `PID`="'.$pid.'")';
    }
    public function delpicture($pid)
    {
      return 'DELETE FROM `dg_picture` WHERE `PID`='.$pid;
    }
    public function picData($pid)
    {
      return 'SELECT * FROM `dg_picture` WHERE `PID`='.$pid;
    }
  }
?>
