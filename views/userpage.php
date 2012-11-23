<?php
	session_start();	
	require_once("header.php");	
?>

<body>
    <?php 
    	require_once("../functions/htmlfunctions.php");
		navbar("user");	
	?>

    <div class="row-fluid">
    	<div class="span12">
		    <div id="all"> 	    			    	
		    	<div class="span10 offset1" id="content">
					<div class="container-fluid"> 
						<div class="row-fluid">
							<div class="span2" id="left" >									
								<div class="row">
									<div id="userImage"> </div> 
								</div>
								

							</div> <!-- left -->
							<div class="span10" id="wrap" style="background-color:yellow;"> 

							</div> <!-- wrapper -->
						</div>			    			    				    	
					</div>  <!-- container -->
				</div><!-- content -->
		    </div>
	    </div>
	</div>

</body>
</html>
