<?php
/* FileName: view_showIcon.php
 * Latest Update: 2014.5.27
 * Author: song374561@gmail.com
 * Usage: To show icon system html_code.
 * require:
 * * pro_iconFolder.php
 * * pro_albumData.php
 * * pro_iconPicture.php
 */
?>
<?php
  require_once('pro_iconFolder.php');
  require_once('pro_albumData.php');
  require_once('pro_iconPicture.php');
  require_once('pro_isLogin.php');

  function v_icon($aid)
  {
    if ($aid === 'root')
    {
      $albums = p_iconFolder();
      foreach($albums as $a)
      {
        if ($a['albumpub'] === '1')
        {
          if ($a['albumpass'] === null)
            echo('<div id="f'.$a['AID'].'"><a href="javascript:void(0)" onclick="loadIcon('.$a['AID'].')"><img src="system/image/folderPub.png">'.$a['albumname'].'</a></div>');
          else
            echo('<div id="f'.$a['AID'].'"><a href="javascript:void(0)" onclick="loadIcon('.$a['AID'].')"><img src="system/image/folderLock.png">'.$a['albumname'].'</a></div>');
        }
        else
          echo('<div id="f'.$a['AID'].'"><a href="javascript:void(0)" onclick="loadIcon('.$a['AID'].')"><img src="system/image/folderPri.png">'.$a['albumname'].'</a></div>');
      }
    }
    else
    {
      $albumData = p_albumData($aid);
      if ($albumData[1] === 1)//public and no-pass album
      {
        $pictures = p_iconPicture($aid);
        foreach($pictures as $p)
        {
          echo('<div id="p'.$p['PID'].'"><a href="javascript:void(0)" onclick="showPic('.$p['PID'].')"><img src="'.$albumData['albumpath'].'/'.$p['picname'].'">'.$p['picname'].'</a></div>');
        }
        //echo('<div id="p1"><a href="javascript:void(0)" onclick="showPic(1)"><img src="album/PublicEx/Craig_Deakin.jpg">Craig_Deakin</a></div>');
      }
      else if ($albumData[1] === 2)//public and passed album
      {
        if (isset($_POST['albumpass']))
        {
          echo($_POST['albumpass']);
        }
        else
        {
          echo('<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">無法進入</a></div>');
        }
      }
      else if ($albumData[1] === 3)//private album
      {
        if (isLogin() === true)
        {
          echo('成功進入');
        }
        else
        {
          echo('<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">無法進入</a></div>');
        }
      }
      else if ($albumData[1] === -1)//album not exist
      {
        echo('<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">無法進入</a></div>');
      }
    }
  }
?>
