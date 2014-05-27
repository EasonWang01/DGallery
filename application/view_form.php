<?php
/* FileName: view_form.php
 * Latest Update: 2014.5.15
 * Author: song374561@gmail.com
 * Usage: To check has visitor logined, and show login/logout form.
 * require:
 * * conf_form.php
 * * pro_isLogin.php
 */
?>
<?php
  require_once('conf_form.php');
  require_once('pro_isLogin.php');

  function v_form()
  {
    $form = new form;
    if (isLogin() !== true)
    {
      echo('<form class="form" action="'.$form->page.'" method="POST">'.$form->closeIcon.'<div class="formMargin">'.$form->usernameArea.$form->passwordArea.$form->loginSubmit.'</div></form>');
    }
    else
    {
      echo('<form class="form" action"'.$form->page.'">'.$form->closeIcon.'<div class="formMargin">'.$form->logoutMessage.$form->logoutSubmit.'</div></form>');
    }
  }
?>
