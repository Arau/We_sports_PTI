
<?php

require_once("db_config.php");
require_once("../src/UserEvent.php");

for($i=0; $i < (sizeof($_POST)/4);++$i){
	
	$return = SetEventUser($_POST["userName-".$i], $_POST["eventName-".$i], $_POST["checkpoint-".$i], $_POST["timeUser-".$i]);
	
}

//SetEventUser(name_user, name_event, TimeCheckpoints, end_time)
$resultado[]=array("updateEvents"=>"1");

echo json_encode($resultado);
?>
