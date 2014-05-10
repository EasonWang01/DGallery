<?php
	require_once('conf_db.php');

	function getPic($pid)
	{
		$database = new database;
		$mysqli = new mysqli($database->host, $database->user, $database->pass, $database->dbname);
		if($mysqli->connect_error)
		{	
			die('Connect Error('.$mysqli->connect_errno.')'.$mysqli->connect_error);
		}

		$pid = $mysqli->real_escape_string($pid);
		$sqlAlbumpath = "SELECT albumpath FROM `dg_album` WHERE AID=(SELECT pAID FROM `dg_pic` WHERE PID=".$pid.")";
		$sqlPicname = "SELECT picname FROM `dg_pic` WHERE PID=".$pid;

		$result1 = $mysqli->query($sqlAlbumpath);
		$result2 = $mysqli->query($sqlPicname);

		$row1 = $result1->fetch_assoc();
		$row2 = $result2->fetch_assoc();

		$path = $row1["albumpath"];
		$name = $row2["picname"];

		$result1->free();
		$result2->free();
		$mysqli->close();

		return $path.$name;
	}
?>