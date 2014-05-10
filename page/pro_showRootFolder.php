<?php
	require_once('conf_db.php');
	require_once('pro_isLogin.php');

	function showRootFolder()
	{
		$database = new database;
		$mysql = new mysqli($database->host, $database->user, $database->pass, $database->dbname);
		if($mysql->connect_error)
		{	
			die('Connect Error('.$mysqli->connect_errno.')'.$mysqli->connect_error);
		}
		if (isLogin() === true)
			$sql = "SELECT AID, albumname FROM `dg_album`";
		else
			$sql = "SELECT AID, albumname FROM `dg_album` WHERE albumpub=1";	

		$result = $mysql->query($sql);
		$i = 0;
		while($row = $result->fetch_assoc())
		{
			$return[$i]["AID"] = $row["AID"];
			$return[$i]["albumname"] = $row["albumname"];
			$i++;
		}

		$result->free();
		$mysql->close();
		return $return;
	}
	

?>