function showForm()
{
	if(!window.loginLeft)
	{
		$("#login").css('display','block');
		changeFancybox();
		loginLeft=$("#login").css('left');
		$("#login").css('left',parseInt(loginLeft)-125+'px');
	}
	else
	{
		$("#login").css('display','none');
		changeFancybox();
		$("#login").css('left','50%');
		delete loginLeft;
	}
}
function changeFancybox()
{
	if($("#fancy_background").css('display') == 'none')
		$("#fancy_background").css('display','block');
	else
		$("#fancy_background").css('display','none');
}