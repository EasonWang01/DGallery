<?php
/* FileName: view_showLockedIcon.php
 * Latest Update: 2014.5.31
 * Author: song374561@gmail.com
 * Usage: To get locked album picture icons.
 * require:
 * * pro_albumData.php;
 * * pro_checkAlbumpass.php;
 */
?>
<?php
  require_once('pro_albumData.php');
  require_once('pro_checkAlbumpass.php');
  require_once('pro_iconPicture.php');

  function v_showLockedIcon($aid,$albumpass)
  {
    echo('<div id="back"><a href="javascript:void(0)" onclick="loadIcon(0)"><img src="system/image/back.png">回首頁</a></div>');
    $albumData = p_albumData($aid);
    if($albumData[1] === 2)
    {
      if(p_checkAlbumpass($aid,$albumpass))
      {
        $pictures = p_iconPicture($aid);
        if($pictures)
          foreach($pictures as $p)
            echo('<div id="p'.$p['PID'].'"><a href="javascript:void(0)"><img id="sp'.$p['PID'].'" onclick="showpic('.$p['PID'].')" src="'.$albumData['albumpath'].'/'.$p['picname'].'">'.$p['picname'].'</a></div>');
      }
      else
      {
        echo('<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">無法進入(correct password)</a></div>');
      }
    }
    else
    {
      echo('<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">無法進入(album type error)</a></div>');
    }
  }
?>
