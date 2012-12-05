
<?php
require_once("db_config.php");



/*LOGIN*/

$usuario = $_POST['usuario'];
$passw = $_POST['password'];

 

$sql="SELECT COUNT(*) AS Total FROM Users WHERE UName = '".$usuario."' AND Password = '".$passw."'";
$result = $mysqli->query($sql);
$res = $result->fetch_assoc();

	if($res["Total"]==1){
		$resultado[]=array("logstatus"=>"1");
	}else{
		$resultado[]=array("logstatus"=>"0");
	}

echo json_encode($resultado);
?>
