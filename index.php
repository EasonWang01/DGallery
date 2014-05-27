<?php
/* FileName: index.php
 * Latest Update: 2014.5.26
 * Author: song374561@gmail.com
 * Usage: To show first page for visitor.
 * require:
 * * view_dginfo.php
 * * view_menu.php
 * * view_form.php
 */
?>
<?php
  require_once('application/view_dginfo.php');
  require_once('application/view_menu.php');
  require_once('application/view_form.php');
?>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo(v_dginfo('title'));?></title>
    <link href="system/css/global.css" type="text/css" rel="stylesheet">
    <link href="system/css/index.css" type="text/css" rel="stylesheet">
    <script src="system/javascript/jquery-1.11.0.js"></script>
    <script src="system/javascript/form.js"></script>
    <script src="system/javascript/fancybox.js"></script>
    <script src="system/javascript/loadIcon.js"></script>
    <script type="text/javascript">
      $(document).ready(loadIcon(0));
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
    <div id="form"><?php v_form();?></div>
    <div id="fancy_background" style="display:none; background-color: rgb(102, 102, 102); opacity: 0.3"></div>
    <div id="load_bar"><img src="system/image/loader.gif"></div>
  </body>
</html>
