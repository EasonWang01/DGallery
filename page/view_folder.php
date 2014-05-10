<?php
	require_once('pro_showRootFolder.php');
	require_once('pro_showPicFolder.php');
	require_once('pro_getpic.php');
	function showFolder($aid)
	{
		if ($aid === 'root')
		{
			$albums = showRootFolder();
			foreach($albums as $a)
			{
				echo('<div class="fol"><a href="javascript:void(0)" onclick="showFolder('.$a["AID"].')"><img src="system/image/folder2.png">'.$a["albumname"].'</a></div>');
			}
		}
		else
		{
			$album = showPicFolder();
			echo('<div class="back"><a href="javascript:void(0)" onclick="showFolder(0)"><img src="system/image/backicon2.png">回首頁</a></div>');
			foreach($album as $a)
			{
				echo('<div class="pic"><a href="javascript:void(0)" onclick="showPic(\''.getPic($a["PID"]).'\')"><img src="'.getPic($a["PID"]).'">'.$a["picname"].'</a></div>');
			}
		}
	}
?>
