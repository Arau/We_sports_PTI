<?php
	require_once("../functions/htmlfunctions.php");
	$zones = getZones();
?>

<div class="span2">	
	<div id="menu_zones">
		<div class="row" id="content_menu">   			
			<ul class="nav nav-pills nav-stacked">	
				<?php 
					$index = 0;
					foreach ($zones as $zone) {
						echo '	<li onclick="toggleActiveZone(this,'.$index.')">
									<a style="margin-left:10px; width:160px; border-style:solid; border-width:1px; " href="#">'.$zone.'</a>
							  	</li> ';								  	
						$index++;
					}
				?>
			  
			</ul>			
		</div>								
	</div>
</div>

