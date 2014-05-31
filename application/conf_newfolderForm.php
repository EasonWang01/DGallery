<?php
/* FileName: conf_newfolderForm.php
 * Latest Update: 2014.5.30
 * Author: song374561@gmail.com
 * Usage: To Create an album.
 * require: none;
 */
?>
<?php
  class newfolderForm
  {
    public $action='DG_user.php';
    public $closeicon='<a href="javascript:void(0)" onclick="toolsForm(\'newfolder\')"><img src="system/image/close.png"></a>';
    public $title='新增相簿';
    public $albumname='<div class="inputLoc"><center>相簿名稱：<input type="text" name="albumname"></center></div>';
    public $albumset='<div class="inputLoc"><center><input type="radio" name="albumset" onclick="albumpassContr(\'lock\')" value="public">公開<input type="radio" name="albumset" onclick="albumpassContr(\'unlock\')" value="encrypt">加密<input type="radio" name="albumset" onclick="albumpassContr(\'lock\')" value="private">隱藏</center></div>';
    public $albumpass='<div class="inputLoc"><center>相簿密碼：<input id="albumpass" type="password" name="albumpass" disabled></center></div>';
    public $submit='<div class="inputLoc"><center><input type="submit" value="新增相簿"></center></div>';
  }
?>
