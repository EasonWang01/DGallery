/* FileName: deldata.js
 * Latest Update: 2014.5.31
 * Author: song374561@gmail.com
 * Usage: To Delete album/picture
 */
function deldata(albumdata,aid)
{
  var id = albumdata.substring(1);
  //alert(albumdata.charAt(0));
  //alert(aid);
  if (albumdata.charAt(0) == 'f')
  {
    $.ajax(
      {
        type:'POST',
        dataType: 'html',
        data:{type:'delalbum',aid:parseInt(id)},
        url: 'DG_tools.php',
        success: function(data)
        {
          loadIcon(0);
          //document.getElementById('folder').innerHTML=data;
        },
        error: function(data)
        {
          document.getElementById('folder').innerHTML='<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤</a></div>';
        }
      });
  }
  else if (albumdata.charAt(0) == 'p')
  {
    $.ajax(
      {
        type:'POST',
        dataType: 'html',
        data:{type:'delpicture',pid:parseInt(id)},
        url: 'DG_tools.php',
        success: function(data)
        {
          loadIcon(aid);
          //document.getElementById('folder').innerHTML=data;
        },
        error: function(data)
        {
          document.getElementById('folder').innerHTML='<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤</a></div>';
        }
      });
  }

}
