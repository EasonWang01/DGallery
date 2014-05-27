/* FileName: loadIcon.js
 * Latest Update: 2014.5.27
 * Author: song374561@gmail.com
 * Usage: Use ajax to load picture, album icon.
 */
function loadIcon(aid)
{
  $.ajax(
    {
      type:'GET',
      dataType: 'html',
      data:{aid:parseInt(aid)},
      url: 'DG_explorer.php',
      success: function(data)
      {
        document.getElementById('folder').innerHTML=data;
      },
      error: function(data)
      {
        document.getElementById('folder').innerHTML='<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤</a></div>';
      },
      beforeSend: function(data)
      {
        $('#load_bar').show();
        $("#fancy_background").css('display','block');
      },
      complete: function(data)
      {
        $('#load_bar').hide();
        $("#fancy_background").css('display','none');
      }
    });
}
