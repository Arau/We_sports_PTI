<?php
	require("User.php");
	
	$nickname = $_POST["nickname"];
	$password = $_POST["password"];
	$deportes = $_POST["deportes"];
	$zonas = $_POST["zonas"];
	$level = $_POST["level"];
	$mail = $_POST["mail"];
	$dbhelper = new DbHelper();
	
	$dbhelper.SetUser($nickname, $password, $deportes, $zonas, $level, $mail);
	
	
