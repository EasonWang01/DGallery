<?php
/* FileName: view_loginForm.php
 * Latest Update: 2014.5.30
 * Author: song374561@gmail.com
 * Usage: To check has visitor logined, and show login/logout form.
 * require:
 * * conf_form.php
 * * pro_isLogin.php
 */
?>
<?php
  require_once('conf_loginForm.php');
  require_once('pro_isLogin.php');

  function v_loginForm()
  {
    $form = new loginForm;
    if (isLogin() !== true)
    {
      echo('<form class="form" action="'.$form->page.'" method="POST">'.$form->closeIcon.$form->loginTitle.'<div class="formMargin">'.$form->usernameArea.$form->passwordArea.$form->loginSubmit.'</div></form>');
    }
    else
    {
      echo('<form class="form" action"'.$form->page.'" method="POST">'.$form->closeIcon.$form->logoutTitle.'<div class="formMargin">'.$form->logoutMessage.$form->logoutSubmit.'</div></form>');
    }
  }
?>
