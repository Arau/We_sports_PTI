<?php
	require_once("../functions/htmlfunctions.php");
	$routes = getRoutes();
?>

<div class="span2">	
	<div id="menu_zones">
		<div class="row" id="content_menu">   			
			<ul class="nav nav-pills nav-stacked">	
				<?php 					
					foreach ($routes as $route) {						
						echo '	<li onclick="toggleActiveRoute(this,&quot;'.$route.'&quot;)">
									<a style="margin-left:10px; width:160px; border-style:solid; border-width:1px; " href="#">'.$route.'</a>
							  	</li> ';								  						
					}
				?>
			  
			</ul>			
		</div>								
	</div>
</div>