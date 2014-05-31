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
 */
?>
<?php
  require_once('application/view_dginfo.php');
  require_once('application/view_menu.php');
  require_once('application/view_loginForm.php');
  require_once('application/view_toolbar.php');
  require_once('application/view_newfolderForm.php');
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
    <script src="system/javascript/loadIcon.js"></script>
    <script src="system/javascript/loadLock.js"></script>
    <script src="system/javascript/toolsForm.js"></script>
    <script src="system/javascript/deldata.js"></script>
    <script src="system/javascript/albumpassContr.js"></script>

    <script type="text/javascript">
      $(document).ready(loadIcon(0));
    </script>
    <script type="text/javascript">
    function dragEvent(aid)
    {
      $.ajax(
        {
          type:'POST',
          dataType: 'script',
          data:{type:'dragevent',aid:parseInt(aid)},
          url: 'DG_tools.php',
          success: function(data){},
          error: function(data)
          {
            document.getElementById('folder').innerHTML='<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤</a></div>';
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
    <header><a href="<?php echo(v_dginfo('headerlilnk'));?>"><?php echo(v_dginfo('header'));?></a></header>
    <div id="menu">
      <ul>
        <li>
          <?php v_menu('index');?>
        </li>
        <li>
          <?php v_menu('member');?>
        </li>
      </ul>
    </div>
    <div id="picshow"></div>
    <div id="folder"></div>
    <footer><a href="<?php echo(v_dginfo('footerlink'));?>"><?php echo(v_dginfo('footer'));?></a></footer>
    <div id="login_form"><?php v_loginForm();?></div>
    <div id="fancy_background" style="display:none; background-color: rgb(102, 102, 102); opacity: 0.3"></div>
    <div id="load_bar"><img src="system/image/loader.gif"></div>

    <div id="newfolder_form"><?php v_newfolderForm();?></div>
    <div id="trash_box"><?php v_toolIcon('trashbox');?></div>

  </body>
</html>
