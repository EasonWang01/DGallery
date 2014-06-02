<?php
/* FileName: index.php
 * Latest Update: 2014.5.30
 * Author: song374561@gmail.com
 * Usage: To show first page for visitor.
 * require:
 * * view_dginfo.php
 * * view_menu.php
 * * view_form.php
 * * view_toolbar.php
 * * view_dragEvent.php
 已知bug：
 1. 刪除同一相簿的其中一張圖片後，整個相簿相片會消失，但其它相片仍在，重新整理即可
 2. 新增圖片後無法直接刪除（未套用dragEvent）
 3. 上傳圖片重複檔名問題需排除
 4. 刪除相簿後，於實體硬碟無法刪除（猜測是權限問題，似乎也有可能是目錄非空）
 5. 刪除同一相簿相片後，需重新整理後才能上傳，否則會一次在資料庫插入多個筆相同圖片
 潛在問題：
 1. 過長資料夾名/相片名稱（未縮排）
 2. 非圖片檔案（未過濾）
 3. 使用者忘記密碼
 4. 加密相簿忘記密碼
 */
?>
<?php
  require_once('application/view_dginfo.php');
  require_once('application/view_menu.php');
  require_once('application/view_loginForm.php');
  require_once('application/view_toolbar.php');
  require_once('application/view_dragEvent.php');
  require_once('application/view_toolIcon.php');
  error_reporting(E_ALL ^ E_NOTICE);
?>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo(v_dginfo('title'));?></title>
    <link href="system/css/global.css" type="text/css" rel="stylesheet">
    <link href="system/css/index.css" type="text/css" rel="stylesheet">
    <script src="system/javascript/jquery-1.11.0.js"></script>
    <script src="system/javascript/loginForm.js"></script>
    <script src="system/javascript/fancybox.js"></script>
    <script type="text/javascript">
      function loadToolbar(aid)
      {
        if (parseInt(aid)<=0)
        {
          $('#new_album').show();
        }
        else
        {
          $('#new_album').hide();
        }
      }
    </script>
    <script src="system/javascript/dragUpload.js"></script>
    <script src="system/javascript/loadIcon.js"></script>
    <script src="system/javascript/loadLock.js"></script>
    <script src="system/javascript/toolsForm.js"></script>
    <script src="system/javascript/deldata.js"></script>
    <script src="system/javascript/albumpassContr.js"></script>
    <script type="text/javascript">
      function showpic(pid)
      {
        document.getElementById('picshow').innerHTML='<img src='+$('#sp'+pid).attr('src')+'></img>';
      }

    </script>
    <script type="text/javascript">
      $(document).ready(loadIcon(0,true));

    </script>
    <script type="text/javascript">
    function dragEvent(aid)
    {
      $.ajax(
        {
          type:'POST',
          dataType: 'script',
          data:{aid:parseInt(aid)},
          url: 'DG_dragevent.php',
          success: function(data){},
          error: function(data)
          {
            //document.getElementById('folder').innerHTML='<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤(drag event error)</a></div>';
            //alert(aid);
          }
        });
      var trash_box = document.getElementById('trash_box');
      trash_box.addEventListener('dragover',function(event){event.preventDefault()},true);
      trash_box.addEventListener('drop',function(event)
      {
        deldata(event.dataTransfer.getData('text/plain'),aid);
        event.preventDefault();
      },true);
    }
    </script>

  </head>
  <body>
    <div id="debug"></div>
    <header><a href="<?php echo(v_dginfo('headerlilnk'));?>"><?php echo(v_dginfo('header'));?></a></header>
    <div id="menu"><ul><li><?php v_menu('index');?></li><li><?php v_menu('member');?></li></ul></div>
    <div id="picshow"></div>
    <div id="folder"></div>
    <footer><a href="<?php echo(v_dginfo('footerlink'));?>"><?php echo(v_dginfo('footer'));?></a></footer>
    <div id="login_form"><?php v_loginForm();?></div>
    <div id="fancy_background" style="display:none; background-color: rgb(102, 102, 102); opacity: 0.3"></div>

    <div id="newfolder_form">
      <form class="form" action="DG_newalbum.php" method="POST">
        <a href="javascript:void(0)" onclick="toolsForm('newfolder')"><img src="system/image/close.png"></a>
        <center>新增相簿</center>
        <div class="formMargin">
          <div class="inputLoc">
            <center>
              相簿名稱：<input type="text" name="albumname">
            </center>
          </div>
          <div class="inputLoc">
            <center>
              <input type="radio" name="albumset" onclick="albumpassContr('lock')" value="public">公開
              <input type="radio" name="albumset" onclick="albumpassContr('unlock')" value="encrypt">加密
              <input type="radio" name="albumset" onclick="albumpassContr('lock')" value="private">隱藏
            </center>
            <div class="inputLoc">
              <center>
                相簿密碼：<input id="albumpass" type="password" name="albumpass" disabled>
              </center>
            </div>
            <div class="inputLoc"><center><input type="submit" value="新增相簿"></center></div>
          </div>
        </div>
      </form>
    </div>

    <div id="trash_box"><?php v_toolIcon('trashbox');?></div>
    <div id="new_album"><a href="javascript:void(0)" onclick="toolsForm('newfolder')"><?php v_toolIcon('newfolder')?></a></div>

  </body>
</html>
