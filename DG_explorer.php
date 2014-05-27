<?php
/* FileName: DG_explorer.php
 * Latest Update: 2014.5.27
 * Author: song374561@gmail.com
 * Usage: To process folder explore requires.
 * require:
 * * view_folder.php
 * * view_showLockedIcon.php
 */
?>
<?php
  require_once('application/view_showIcon.php');
  require_once('application/view_showLockedIcon.php');
?>
<html>
  <body>
    <?php
      if (isset($_GET['aid']) && is_numeric($_GET['aid']))
      {
        if (is_numeric($_GET['aid']))
        {
          if ($_GET['aid'] <= 0)
            v_showIcon('root');
          else
            v_showIcon($_GET['aid']);
        }
        else
          echo('<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤</a></div>');
      }
      else
      {
        if (is_numeric($_POST['aid']) && $_POST['aid']>0)
          v_showLockedIcon($_POST['aid'],strtoupper(sha1($_POST['albumpass'])));
        else
          echo('<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤</a></div>');
      }
    ?>
  </body>
</html>
