/* FileName: loginForm.js
 * Latest Update: 2014.5.30
 * Author: song374561@gmail.com
 * Usage: To show/unshow <div id="login_form">;
 */

function loginForm()
{
  if (!window.isShowLogin)
  {
    $("#login_form").css('display','block');
    fancybox(true);
    isShowLogin=true;
  }
  else
  {
    $("#login_form").css('display','none');
    fancybox(false);
    delete isShowLogin;
  }
}
