/* FileName: albumpassContr.js
 * Latest Update: 2014.5.30
 * Author: song374561@gmail.com
 * Usage: To albumpass text area when user choose to create encrypt album.
 */
function albumpassContr(status)
{
  if (status == 'lock')
    $('#albumpass').attr({'disabled':''});
  else
    $('#albumpass').removeAttr('disabled');
}
