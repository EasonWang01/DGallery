<?php
/* FileName: DG_explorer.php
 * Latest Update: 2014.5.27
 * Author: song374561@gmail.com
 * Usage: To process folder explore requires.
 * require:
 * * view_folder.php
 */
?>
<?php
  require_once('application/view_showIcon.php');
?>
<html>
  <body>
    <?php
      if (is_numeric($_GET['aid']))
      {
        if ($_GET['aid'] <= 0)
          v_icon('root');
        else
          v_icon($_GET['aid']);
      }
      else
        echo('<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤</a></div>');
    ?>
  </body>
</html>
