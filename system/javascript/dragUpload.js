/* FileName: dragUpload.js
 * Latest Update: 2014.6.2
 * Author: song374561@gmail.com
 * Usage: Drag Upload Pictures.
 */
function dragUpload(aid)
{
  $('#folder').on('dragover',function(e){e.preventDefault();});
  document.getElementById('folder').addEventListener('drop',function(e)
  {
    e.preventDefault();
    var files = e.dataTransfer.files;
    var formdata = new FormData();
    formdata.append('type','uploadpic');
    formdata.append('aid',aid);
    formdata.append('file',files[0]);
    $.ajax(
      {
        type:'POST',
        data:formdata,
        dataType:'html',
        processData: false,
        contentType:false,
        url:'DG_uploader.php',
        success: function(data)
        {
          document.getElementById('folder').innerHTML=data;
        },
        error: function(data)
        {
          document.getElementById('folder').innerHTML='<div id="pe"><a href="javascript:void(0)"><img src="system/image/error.png">系統錯誤 (drag upload error)</a></div>';
        }
      });

  },true);
}
