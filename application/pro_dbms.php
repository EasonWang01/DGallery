<?php
/* FileName: pro_dbms.php
 * Latest Update: 2014.5.27
 * Author: song374561@gmail.com
 * Usage: Database Manager function system.
 * require:
 * * conf_dbinfo.php;
 * * conf_dbcmd.php;
 */
?>
<?php
  require_once('conf_dbinfo.php');
  require_once('conf_dbcmd.php');

  function p_dbms_login($username,$password)
  {
    $dbinfo = new dbinfo;
    $dbcmd = new dbcmd;
    $dbconnect = new mysqli($dbinfo->server, $dbinfo->user, $dbinfo->pass, $dbinfo->database);
    if ($dbconnect->connect_error)
    {
      die('Conncet Error('.$dbconnect->connect_errorno.')'.$dbconnect->connect_error);
    }
    if (!$dbconnect->set_charset("utf8"))
    {
      printf("Error loading character set utf8: %s\n", $dbconnect->error);
    }

    $username = $dbconnect->real_escape_string($username);
    if ($result = $dbconnect->query($dbcmd->login($username)))
    {
      while($rowdata = $result->fetch_assoc())
      {
        if ($password === $rowdata['password'])
        {
          $_SESSION['user'] = true;
          break;
        }
      }
      $result->free();
    }
    $dbconnect->close();
  }
  function p_dbms_albums($isLogin)
  {
    $dbinfo = new dbinfo;
    $dbcmd = new dbcmd;
    $dbconnect = new mysqli($dbinfo->server, $dbinfo->user, $dbinfo->pass, $dbinfo->database);
    if ($dbconnect->connect_error)
    {
      die('Connect Error('.$dbconnect->connect_errorno.')'.$dbconnect->connect_error);
    }
    if (!$dbconnect->set_charset("utf8"))
    {
      printf("Error loading character set utf8: %s\n", $dbconnect->error);
    }

    if ($result = $dbconnect->query($dbcmd->albums($isLogin)))
    {
      $i = 0;
      while($rowdata = $result->fetch_assoc())
      {
        $return[$i]['AID'] = $rowdata['AID'];
        $return[$i]['albumname'] = $rowdata['albumname'];
        $return[$i]['albuminfo'] = $rowdata['albuminfo'];
        $return[$i]['albumpath'] = $rowdata['albumpath'];
        $return[$i]['albumpass'] = $rowdata['albumpass'];
        $return[$i]['albumpub'] = $rowdata['albumpub'];
        $i++;
      }
      $result->free();
    }
    $dbconnect->close();
    return $return;
  }
  function p_dbms_albumData($aid)
  {
    $dbinfo = new dbinfo;
    $dbcmd = new dbcmd;
    $dbconnect = new mysqli($dbinfo->server, $dbinfo->user, $dbinfo->pass, $dbinfo->database);
    if ($dbconnect->connect_error)
    {
      die('Connect Error('.$dbconnect->connect_errorno.')'.$dbconnect->connect_error);
    }
    if (!$dbconnect->set_charset("utf8"))
    {
      printf("Error loading character set utf8: %s\n", $dbconnect->error);
    }
    if ($result = $dbconnect->query($dbcmd->albumData($aid)))
    {
      if ($result->num_rows === 0)
        $rowdata = 0;
      else
        $rowdata = $result->fetch_assoc();
      $result->free();
    }
    $dbconnect->close();
    return $rowdata;
  }
  function p_dbms_pictures($aid)
  {
    $dbinfo = new dbinfo;
    $dbcmd = new dbcmd;
    $dbconnect = new mysqli($dbinfo->server, $dbinfo->user, $dbinfo->pass, $dbinfo->database);
    if ($dbconnect->connect_error)
    {
      die('Connect Error('.$dbconnect->connect_errorno.')'.$dbconnect->connect_error);
    }
    if (!$dbconnect->set_charset("utf8"))
    {
      printf("Error loading character set utf8: %s\n", $dbconnect->error);
    }

    if ($result = $dbconnect->query($dbcmd->pictures($aid)))
    {
      $i = 0;
      while($rowdata = $result->fetch_assoc())
      {
        $return[$i]['PID'] = $rowdata['PID'];
        $return[$i]['picname'] = $rowdata['picname'];
        $return[$i]['picinfo'] = $rowdata['picinfo'];
        $i++;
      }
      $result->free();
    }
    $dbconnect->close();
    return $return;
  }
?>
