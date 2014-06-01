/* FileName: deldata.js
 * Latest Update: 2014.5.31
 * Author: song374561@gmail.com
 * Usage: To Delete album/picture
 */
function deldata(albumdata,aid)
{
  var id = albumdata.substring(1);
  if (albumdata.charAt(0) == 'f')
  {
    $.ajax(
      {
        type:'POST',
        dataType: 'html',
        data:{aid:parseInt(id)},
        url: 'DG_delalbum.php',
        success: function(data)
        {
          document.getElementById('folder').innerHTML=data;
        },
        error: function(data)
        {
          document.getElementById('folder').innerHTML='<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤(delete album error)</a></div>';
        }
      });
  }
  else if (albumdata.charAt(0) == 'p')
  {
    $.ajax(
      {
        type:'POST',
        dataType: 'html',
        data:{pid:parseInt(id)},
        url: 'DG_delpicture.php',
        success: function(data)
        {
          document.getElementById('folder').innerHTML=data;
        },
        error: function(data)
        {
          document.getElementById('folder').innerHTML='<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤(delete picture error)</a></div>';
        }
      });
  }

}
