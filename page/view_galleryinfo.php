<?php
	require_once('conf_galleryinfo.php');
	
	function showInfo($item)
	{
		$info = new galleryinfo;
		switch($item)
		{
			case 'title':
				return $info->title;
			case 'header':
				return $info->header;
			case 'footer':
				return $info->footer;
			case 'headerLink':
				return $info->headerLink;
			case 'footerLink':
				return $info->footerLink;
		}
	}
?>