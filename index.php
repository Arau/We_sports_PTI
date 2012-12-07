<?php
	session_start();	
	require_once("header.php");	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
       "http://www.w3.org/TR/html4/loose.dtd">

<body>
    <?php 
    	require_once("functions/htmlfunctions.php");
		navbar("index");	
	?>

    <div class="row-fluid">

	    <div id="all">  </div>
		
		<div class="span2 offset2" > 
			<div style="
					margin-top: -400px; 
					margin-left: -50px;
					height:		200px; 
					width:		250px; 
					background:url('./friendsandsport/cycleing.png'); ">
			</div>
	    </div>
	    
	    <div class="span2 offset1" > 
			<div style="margin-top: -400px; 
					height:		180px; 
					width:		130px; 
					background:url('./friendsandsport/roller.png'); ">
			</div>
	    </div>

		<div class="span2" > 
			<div style="margin-top: -400px; 
					height:		164px; 
					width:		190px; 
					background:url('./friendsandsport/runing.png'); ">
			</div>
	    </div>
	    
    </div>

	<script type="text/javascript">	modal(); </script>
</body>
</html>
