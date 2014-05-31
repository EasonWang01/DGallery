/* FileName: toolsForm.js
 * Latest Update: 2014.5.30
 * Author: song374561@gmail.com
 * Usage: To show/unshow <div id="newfolder_form">;
 */

function toolsForm(toolName)
{
  if (toolName == 'newfolder')
  {
    if (!window.isShowNewfolder)
    {
      $("#newfolder_form").css('display','block');
      fancybox(true);
      isShowNewfolder=true;
    }
    else
    {
      $("#newfolder_form").css('display','none');
      fancybox(false);
      delete isShowNewfolder;
    }
  }
  if (toolName == 'delfolder')
  {
    if (!window.isShowDelfolder)
    {
      $("#delfolder_form").css('display','block');
      fancybox(true);
      isShowDelfolder=true;
    }
    else
    {
      $("#delfolder_form").css('display','none');
      fancybox(false);
      delete isShowDelfolder;
    }
  }

}
