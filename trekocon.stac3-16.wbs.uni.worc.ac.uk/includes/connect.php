<?php
	session_start();

	try
	{
		$host="172.16.11.22";
		$dbname="stac3_16_trekocon";
		$user="stac3_trekocon";
		$pass="Trekocon123!!";
		$charset="utf8mb4";
		$dbc="mysql:host=$host;dbname=$dbname;charset=$charset";
		$opt=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			  PDO::ATTR_EMULATE_PREPARES => true];
		$pdo=new PDO($dbc,$user,$pass,$opt);
	}
	
	catch(Exception $fck)
	{
		echo $fck -> getMessage();
	}
?>