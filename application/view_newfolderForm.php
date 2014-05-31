<?php
/* FileName: view_newfolderForm.php
 * Latest Update: 2014.5.30
 * Author: song374561@gmail.com
 * Usage: To Create an album.
 * require:
 * * conf_newfolderForm.php;
 * * pro_isLogin.php;
 */
?>
<?php
  require_once('conf_newfolderForm.php');
  require_once('pro_isLogin.php');

  function v_newfolderForm()
  {
    $form = new newfolderForm;
    if (isLogin() === true)
    {
      echo ('<form class="form" action="DG_tools.php" method="POST">'.$form->closeicon.'<center>'.$form->title.'</center><div class="formMargin">'.$form->albumname.$form->albumset.$form->albumpass.'<input type="hidden" name="type" value="newalbum">'.$form->submit.'</div></form>');
    }
  }
?>
