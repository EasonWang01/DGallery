/* FileName: loadIcon.js
 * Latest Update: 2014.6.1
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
        dragEvent(aid);
        //loadToolbar(aid);
        dragUpload(aid);
      },
      error: function(data)
      {
        document.getElementById('folder').innerHTML='<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤</a></div>';
      }
    });

}
