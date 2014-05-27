/* FileName: form.js
 * Latest Update: 2014.5.15
 * Author: song374561@gmail.com
 * Usage: To show/unshow <div id=form>;
 */

function form()
{
  if (!window.isShow)
  {
    $(".form").css('display','block');
    fancybox();
    isShow=true;
  }
  else
  {
    $(".form").css('display','none');
    fancybox();
    delete isShow;
  }
}
