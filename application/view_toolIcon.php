<?php
/* FileName: view_toolIcon.php
 * Latest Update: 2014.5.31
 * Author: song374561@gmail.com
 * Usage: To show first page for visitor.
 * require:
 * * conf_toolIcon.php;
 * * pro_isLogin.php;
 */
?>
<?php
  require_once('conf_toolIcon.php');
  require_once('pro_isLogin.php');
  function v_toolIcon($item)
  {
    if (isLogin() === true)
    {
        $icon = new toolIcon;
        echo($icon->$item);
    }
  }
?>
