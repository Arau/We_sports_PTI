<?php

	require_once('./functions/htmlfunctions.php');
	
	$script = "
		<script>
			$(function() {
			  // Setup drop down menu
			  $('.dropdown-toggle').dropdown();
			 
			  // Fix input element click problem
			  $('.dropdown input, .dropdown label').click(function(e) {
				e.stopPropagation();
			  });
			});
		</script>";

	$login_layout = print_loggin_layout(0);
	$navBars = ' 
	<div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <ul>
                    <li style="color:white" class="brand">Friends and Sport</li>
                </ul>
                <div class="nav pull-right"><!-- Other nav bar content -->
                    <ul class="nav pull-right">'                    
	                    .$login_layout.'
                    </ul>
                </div>
            </div>
            '.$script.'

        <div class="navbar  secondary-nav navbar-inverse">  
            <div class="navbar-inner">  
                <div class="container-fluid">  
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">  
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
                    </a>  
                    <div class="nav-collapse">  
                        <ul class="nav pagination-centered"> 
                	        <li>
                	            <a href="#">Home</a>
                	        </li>
		                    <li>
		                        <a href="#">Circuits</a>
		                    </li>
		                    <li>   
		                        <a href="viewer.php">PPT Viewer</a>
		                    </li>
		                    <li class="dropdown">
			                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                        Esports
			                        <b class="caret"></b>
			                    </a>
			                    <ul class="dropdown-menu">
			                        <li>
	        		                    <a href="#">	Ciclisme </a>
			                        </li>
			                        <li>
	        		                    <a href="#">Running</a>
			                        </li>
			                        <li>
	        		                    <a href="#">RollerBlading</a>
			                        </li>
		                        </ul>
		                    </li> 
                        </ul>  
                    </div><!--/.nav-collapse -->  
                </div><!--/.container-fluid -->   
            </div><!--/.navbar-inner -->
        </div><!--/.navbar navbar-inverse -->';

	echo $navBars;
?>