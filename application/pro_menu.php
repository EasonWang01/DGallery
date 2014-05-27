<?php
/* FileName: pro_menu.php
 * Latest Update: 2014.5.15
 * Author: song374561@gmail.com
 * Usage: Besides the parameters, show show the menu.
 * require:
 * * conf_menu.php
 */
?>
<?php
  require_once('conf_menu.php');

  function p_menu($choosen)
  {
    $menu = new menu;
    return $menu->$choosen;
  }
?>
