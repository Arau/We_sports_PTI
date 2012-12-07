<?php		
		
		require_once("/homepages/6/d434798839/htdocs/fands/public_html/conf.php");	
		$mysqli = new mysqli($db['host'], $db['user'], $db['pass'], $db['name']);
		if ($mysqli->connect_errno) {
			printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
		}
?>
