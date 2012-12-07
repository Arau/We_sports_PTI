<?php 
	require_once("../functions/htmlfunctions.php");

	$i = 0;
	function mapModal($route,$i) {			
		$mapmodal = ' 
			<a href="#mapmodal'.$i.'" role="button" data-toggle="modal" onclick="showMapModal('.$i.',&quot;'.$route.'&quot;)"> 
				view map 				
			</a>
					
			<div id="mapmodal'.$i.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="MyModalLabel" aria-hidden="true">
			    <div id="'.$i.'" class="modal" style="width: 800px; height:500px; margin-left:-400px;">
	    			<div class="modal-header">
	    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    				<h3>'.$route.'</h3>

	    			</div>
	    			<div class="modal-body" style="height:500">	    				
	    				<div id="map_modal'.$i.'"> </div>
	    			</div>	    			
	    		</div>
	    	</div>
		';		
		return $mapmodal;
	}	

	$routes = getRoutes();
	$i = 0;
	foreach ($routes as $route) {												
		if ($i >= 9 ) break;
		++$i;		
		if ($i <= 3)
			$routes_thumbs .='
				<li class="span4">
					<div class="caption">
						<div class="thumbnail">							
  								<h3 style="margin-top:-9px;"><small>'.$route.'</small></h3>		  								
  								'.mapModal($route,$i).'								
						</div>
					</div>	
			  	</li> ';								  						
		else if ($i > 3 && $i <= 6)
			$routes_thumbs2 .= '
				<li class="span4">
					<div class="caption">
						<div class="thumbnail">							
  								<h3 style="margin-top:-9px;"><small>'.$route.'</small></h3>										
  								'.mapModal($route,$i).'
						</div>
					</div>	
			  	</li> ';	
		else 
			$routes_thumbs3 .= '
				<li class="span4">
					<div class="caption">
						<div class="thumbnail">							
  								<h3 style="margin-top:-9px;"><small>'.$route.'</small></h3>										
  								'.mapModal($route,$i).'
						</div>
					</div>	
			  	</li> ';	
	}
				
	$layout = ' 

		<div class="page-header">
  			<h1><small>Last routes</small></h1>
		</div>	
		<div class="row-fluid">
			<ul id="lastRoutes" class="thumbnails"> 
				'.$routes_thumbs.'
			</ul>
		</div>

		<div class="row-fluid">
			<ul id="lastRoutes" class="thumbnails"> 
				'.$routes_thumbs2.'
			</ul>
		</div>

		<div class="row-fluid">
			<ul id="lastRoutes" class="thumbnails"> 
				'.$routes_thumbs3.'
			</ul>
		</div>

		<div class="page-header">
  			<h1><small>Near events </small></h1>
		</div>			
	';		
		
	echo $layout;
?>