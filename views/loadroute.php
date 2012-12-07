<?php
	require_once("../functions/htmlfunctions.php");
	$route = $_GET['route'];
	$points = getGeosOfRoute($route);
//var_dump($points);

	header("Content-type: text/xml; charset=utf-8");		
	echo '
		<response>';		
	$i = 0;
	for (; $i < sizeof($points); ++$i) {				
		echo "
			<geopoint>
				<lat>
					".$points[$i]['lat']."
				</lat>
				<long>
					".$points[$i]['long']."
				</long>
			</geopoint>";		
	}
	
	echo '
		<size>'.$i.' </size>';

	echo'		
		</response>';
	
?>