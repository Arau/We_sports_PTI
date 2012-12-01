<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */		

	$dbconfig["db_server"] = "localhost";
		$dbconfig["db_port"] = "3306";
		$dbconfig["db_username"] = "dbo437267467";
		$dbconfig["db_password"] = "proyectopti";
		$dbconfig["db_name"] = "db437267467";
		$dbconfig["db_type"] = "mysql";
		$dbconfig["db_status"] = "true";
		$dbconfig["db_hostname"] = $dbconfig["db_server"].$dbconfig["db_port"];
		$mysqli = new mysqli($dbconfig["db_server"], $dbconfig["db_username"], $dbconfig["db_password"], $dbconfig["db_name"],$dbconfig["db_port"]);
		if ($mysqli->connect_errno) {
			printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
		}

             
?>
