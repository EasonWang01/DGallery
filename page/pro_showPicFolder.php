<?php
	require_once('conf_db.php');

	function showPicFolder()
	{
		$database = new database;
		$mysql = new mysqli($database->host, $database->user, $database->pass, $database->dbname);
		if($mysql->connect_error)
		{	
			die('Connect Error('.$mysqli->connect_errno.')'.$mysqli->connect_error);
		}
		$sql = "SELECT PID, picname FROM `dg_pic`";

		$result = $mysql->query($sql);
		$i = 0;
		while($row = $result->fetch_assoc())
		{
			$return[$i]["PID"] = $row["PID"];
			$return[$i]["picname"] = $row["picname"];
			$i++;
		}

		$result->free();
		$mysql->close();
		return $return;
	}
?>