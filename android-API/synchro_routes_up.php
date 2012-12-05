
<?php

//ob_start();

require_once("db_config.php");
require_once("../src/Ruta.php");

for($i=0; $i < (sizeof($_POST)/6);++$i){
	$route = new Ruta();
	$route-> CreateRuta($_POST["nameRoute-".$i] ,$_POST["nameUser-".$i], $_POST["km-".$i], 0, $_POST["time-".$i], $_POST["routePoints-".$i], $_POST["sport-".$i]);
}

//if($res["Total"]==1){
	$resultado[]=array("updateRoutes"=>"1");
/*}else{
	$resultado[]=array("logstatus"=>"0");
}*/

echo json_encode($resultado);

/*
$page = ob_get_contents();
ob_end_flush();
$fp = fopen("output.html","w");
fwrite($fp,$page);
fclose($fp);*/





?>
