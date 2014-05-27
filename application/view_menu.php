<?php
/* FileName: view_menu.php
 * Latest Update: 2014.5.15
 * Author: song374561@gmail.com
 * Usage: To check has user logined, and show the menu.
 * require:
 * * pro_isLogin.php
 */
?>
<?php
  require_once('pro_isLogin.php');
  require_once('pro_menu.php');

  function v_menu($button)
  {
    switch($button)
    {
      case 'index':
        echo('<a href="'.p_menu('indexLink').'">'.p_menu('index').'</a>');
      break;
      case 'member':
        if (isLogin()===true)
          echo('<a href="'.p_menu('logoutLink').'" onclick="form()">'.p_menu('logout').'</a>');
        else
          echo('<a href="'.p_menu('loginLink').'" onclick="form()">'.p_menu('login').'</a>');
      break;
    }

  }

?>
