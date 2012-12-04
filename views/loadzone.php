<?php
	require_once("../functions/htmlfunctions.php");
	$zone = $_GET['zone'];
	$point = getMiddleGeoPoint($zone);
	

	header("Content-type: text/xml; charset=utf-8");		
	echo "<response>
			<geopoint>
				<lat>
					".$point['lat']."
				</lat>
				<long>
					".$point['long']."
				</long>
			</geopoint>
		</response>";
	
?>