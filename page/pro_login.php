<?php
	require_once('conf_db.php');
	
	session_start();
	function login($username,$password)
	{
		$database = new database;
		
		$mysqli = new mysqli($database->host,$database->user,$database->pass,$database->dbname);
		if($mysqli->connect_error)
		{
			die('Connect Error('.$mysqli->connect_errno.')'.$mysqli->connect_error);
		}
		
		$username = $mysqli->real_escape_string($username);
		$password = $mysqli->real_escape_string($password);
		$password = strtoupper(sha1($password));
		
		if ($result = $mysqli->query("SELECT password FROM `dg_user` WHERE username='".$username."'"))
		{
			while($row = $result->fetch_assoc())
			{
				if($password === $row["password"])
				{
					$_SESSION['user'] = true;
					break;
				}
			}
			$result->free();
		}
		$mysqli->close();
	}
?>