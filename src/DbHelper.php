2<?php
	require_once("config.php");
	class DbHelper {
		global $debug;
		public $infoUser = new array();
		
		$mysqli = new mysqli("localhost", "victor.cayuela", "proyectopti", "db43726746");
			if ($mysqli->connect_errno) {
			    echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
		echo $mysqli->host_info . "\n";
				
		
		function GetLogin($name, $pass) {
			$result = $mysqli->query("SELECT COUNT(*) AS resultado FROM Users WHERE Uname = '".$name."' AND Password = '".$pass."'")
			if(!$result){
				if($debug)die($mysqli->error);
				else return -1;		
				
			}
			if ($result->num_rows == 1) return 0;
			else return -1;
		}
		
		function GetUserInfo($name) {
			$result = $mysqli->query("SELECT COUNT(*) AS resultado FROM Users WHERE Uname = '".$name."'") 
			if(!$result){
				if($debug)die($mysqli->error);
				else return -1;		
				
			}
			$infouser=new User();
				$infoUser["mail"] = $result['Mail'];
				$infoUser["level"] = $result['Level'];
				$deportes = $mysqli->query("SELECT * FROM User-Sport");
				$zonas = $mysqli->query("SELECT * FROM User-Zones");
			}
			return $infoUser;
		}
				
		function SetUser($nickname, $password, $deportes, $zonas, $level, $mail) {
			$sql = "INSERT INTO Users VALUES ("NULL", "$nickname", "$password", "$mail", "$level")";
			$sql2 = "INSERT INTO User-Sport VALUES ("NULL", "$deportes")";
			$sql3 = "INSERT INTO User-Zones VALUES ("NULL", "$zonas")";
		}
		
		function SetZonaRuta($zona, $ruta) {
			$sql = "INSERT INTO ZonesRoutes VALUES ("$ruta", "$zona")";
		}
		
		function SetRuta($name, $distancia, $desnivel, $nivel) {
			$sql = "INSERT INTO Routes VALUES ("NULL", "$name", "$distancia", "$desnivel", $nivel)";
		}
		
		function SetEvento($name, $ruta, $descripcion) {
			$sql = "INSERT INTO Event VALUES ("NULL", "$name", "$ruta", "$descripcion")";
		}
	}

?>
