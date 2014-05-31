/* FileName: fancybox.js
 * Latest Update: 2014.5.30
 * Author: song374561@gmail.com
 * Usage: To show fancybox.
 */

function fancybox(status)
{
  if($("#fancy_background").css('display')=='none' && status == true)
    $("#fancy_background").css('display','block');
  else if ($("#fancy_background").css('display')=='block' && status==false)
    $("#fancy_background").css('display','none');
}
