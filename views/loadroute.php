<?php
	require_once("../functions/htmlfunctions.php");
	$route = $_GET['route'];
	$points = getGeosOfRoute($route);
//var_dump($points);

	header("Content-type: text/xml; charset=utf-8");		

	$xmlGeo = "";	
	$lat = ""; $long = ""; $i = 0;
	foreach ($points as $key => $value) {		
		if ($value != "") {
			if (intval($key)%2 == 0) 	
				$lat = $points[$i]['lat'];			
			else { 						
				$long = $points[$i]['long'];
				$i++;
			}
		}
		$xmlGeo .= "
					<geopoint>
						<lat>
							".$lat."
						</lat>
						<long>
							".$long."
						</long>
					</geopoint>";
	}

	echo '
		<response>
			'.$xmlGeo.'			
		</reponse>';
	
?>