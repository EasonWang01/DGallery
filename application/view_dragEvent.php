<?php
/* FileName: view_dragevent.php
 * Latest Update: 2014.5.31
 * Author: song374561@gmail.com
 * Usage: To show first page for visitor.
 * require:
 * * pro_dragEvent.php;
 */
?>
<?php
  require_once('pro_dragevent.php');
  function v_dragevent($aid)
  {
    if ($aid === 'root')
    {
      $albums = p_dragEvent(0);
      foreach($albums as $a)
      {
        echo('document.getElementById("f'.$a['AID'].'").addEventListener("dragstart",function(event){event.dataTransfer.setData("text/plain",$("#f'.$a['AID'].'").attr("id"))},true);');
      }
    }
    else
    {
      $pictures = p_dragEvent($aid);
      //echo('alert("'.$pictures.'")');
      if($pictures != 0)
      {
        //echo('alert("test1")');
        foreach($pictures as $p)
        {
          echo('document.getElementById("p'.$p['PID'].'").addEventListener("dragstart",function(event){event.dataTransfer.setData("text/plain",$("#p'.$p['PID'].'").attr("id"))},true);');
        }
      }
      else
      {
        echo('document.getElementById("folder").innerHTML="<div id=\'back\'><a href=\'javascript:void(0)\' onclick=\'loadIcon(0)\'><img src=\'system/image/back.png\'>回首頁</a></div>"');
      }
    }
  }
?>
