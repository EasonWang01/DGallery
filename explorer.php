<?php
	require_once('page/view_folder.php');
?>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<?php 
			if($_POST["albumId"]<=0)
				showFolder('root');
			else
				showFolder($_POST["albumId"]);
		?>
	</body>
</html>