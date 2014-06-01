<?php
/* FileName: pro_dbms.php
 * Latest Update: 2014.6.1
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
  error_reporting(E_ALL ^ E_NOTICE);

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
      if ($result->num_rows === 0)
        $rowdata = 0;
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
  /*function p_dbms_albumpass($aid)
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

    if ($result = $dbconnect->query($dbcmd->albumpass($aid)))
    {
      $rowdata = $result->fetch_assoc();
      $result->free();
    }
    $dbconnect->close();
    return $rowdata;
  }*/
  function p_dbms_newalbum($albumname, $albumpath, $albumpub, $albumpass)
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

    $date = date("Y-n-j");
    $albumname = $dbconnect->real_escape_string($albumname);
    if ($result = $dbconnect->query($dbcmd->checkPath($albumpath)))
    {
        while($result->num_rows)
        {
          $result->free();
          $albumpath = 'album/$'.md5($albumpath);
          $result = $dbconnect->query($dbcmd->checkPath($albumpath));
        }
        $dbconnect->query($dbcmd->newalbum($albumname, $albumpath, $albumpub, $albumpass,$date));
        $result->free();
        $result = $dbconnect->query($dbcmd->checkPath($albumpath));
        $rowdata = $result->fetch_assoc();
        $result->free();
    }
    $dbconnect->close();
    return $rowdata;
  }
  function p_dbms_delalbum($aid)
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

    if ($dbconnect->query($dbcmd->delalbum($aid)));
    $dbconnect->close();
  }
  function p_dbms_picpath($pid)
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

    if ($result = $dbconnect->query($dbcmd->picpath($pid)))
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
  function p_dbms_delpicture($pid)
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
    if ($dbconnect->query($dbcmd->delpicture($pid)));
    $dbconnect->close();
  }
  function p_dbms_picData($pid)
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

    if ($result = $dbconnect->query($dbcmd->picData($pid)))
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
  /*function p_dbms_checkpicname($picname)
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

    $picname = $dbconnect->real_escape_string($picname);
    if ($result = $dbconnect->query($dbcmd->checkpicname($picname)))
    {
      if ($result->num_rows===0)
        $return = 1;
      else
        $return = 0;
      $result->free();
    }
    $dbconnect->close();
    return $return;
  }*/
  function p_dbms_newpicture($aid,$filename)
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
    $filename = $dbconnect->real_escape_string($filename);
    if($dbconnect->query($dbcmd->newpicture($aid,$filename)));
    $dbconnect->close();
  }
?>
