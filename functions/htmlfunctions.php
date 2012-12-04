<?php
 
function print_loggin_layout($log) {		
	if (isset($_SESSION['logged']) and $_SESSION['logged'] == 1) {
		$user = $_SESSION['user'];	
		$layout = '
				<li style="color:#00aa00; font-size:17px;margin-right:35px;">'.$user.'</li>							
				<li onclick="logout()" class="btn btn-small btn-info" style="margin-top:-4px; margin-right:10px;"> Logout </li>
				';
	}	
	else {		  			
		$open = array('','');		
		if ($log == 1) {
			$open[0] = ' open';
			$open[1] = '<span style="color:red"> Fail login </span>';
		}
		$register_form = '
		
		<form id="register_form" class="form-horizontal" method="post" action="">
		  <div class="control-group">
		     <label class="control-label">Name</label>
		    	<div class="controls"> 
    				<input type="text" id="name_reg" placeholder="Name">
    			</div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="email">Email</label>
		    <div class="controls">
		      <input type="text" id="mail_reg" placeholder="Email">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="password">Password</label>
		    <div class="controls">
		      <input type="password" id="pwd_reg" placeholder="Password">
		  	</div>
		  </div>		  
		  <div class="control-group">
		  	  <label class="control-label">Sport</label>
		  	  <div class="controls">
				  <div class="btn-group" data-toggle="buttons-checkbox">
					  <button id="cycle-button" onclick="cycl()" type="button" class="btn btn-small btn-info">Cycling</button>
					  <button id="roller-button" onclick="roller()" type="button" class="btn btn-small btn-info">Roller</button>
					  <button id="running-button" onclick="running()" type="button" class="btn btn-small btn-info">Running</button>
				  </div>
			  </div>
		  </div>
		  <div id="cycling-levels" class="control-group" style="display:none;">
		  	  <label id="cyclingText" class="control-label">Cycling Level</label>
		  	  <div class="controls">
				  <div class="btn-group" data-toggle="buttons-radio">				  
					  <button id="beginer_cyc_button"  type="button" class="btn btn-small">Beginer</button>
					  <button id="amateur_cyc_button" type="button" class="btn btn-small">Amateur</button>
					  <button id="expert_cyc_button"  type="button" class="btn btn-small">Expert</button>
				  </div>
				  <span id="atLeastCyc" style="display:none;color:red;font-size:12;"> select one level </span> 
			  </div>			  
		  </div>
		  <div id="roller-levels" class="control-group" style="display:none;">
		  	  <label id="rollerText" class="control-label">Roller Level</label>
		  	  <div class="controls">
				  <div class="btn-group" data-toggle="buttons-radio">				  
					  <button id="beginer_roller_button" type="button" class="btn btn-small">Beginer</button>
					  <button id="amateur_roller_button" type="button" class="btn btn-small">Amateur</button>
					  <button id="expert_roller_button"  type="button" class="btn btn-small">Expert</button>
				  </div>
				  <span id="atLeastRoll" style="display:none;color:red;font-size:12;"> select one level </span> 
			  </div>			  
		  </div>
		  <div id="running-levels" class="control-group" style="display:none;">
		  	  <label id="runningText" class="control-label">Running Level</label>
		  	  <div class="controls">
				  <div class="btn-group" data-toggle="buttons-radio">				  
					  <button id="beginer_run_button" type="button" class="btn btn-small">Beginer</button>
					  <button id="amateur_run_button" type="button" class="btn btn-small">Amateur</button>
					  <button id="expert_run_button"  type="button" class="btn btn-small">Expert</button>
				  </div>
				  <span id="atLeastRun" style="display:none;color:red;font-size:12;"> select one level </span> 
			  </div>			  
		  </div>
		</form>';
	
		$layout = '

			<li style=" margin-top:-11px; margin-right:6px">											
				<button href="#myModal" class="btn btn-small" data-toggle="modal"> Register </button>				
				<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3>Register</h3>
					</div>
					<div class="modal-body">
					'.$register_form.'
					</div>
					<div class="modal-footer">
						<div class="control-group">
						    <div class="controls">
						      	<button onclick="closeRegister()" class="btn"> Cancel </button>
						      	<button onclick="submitRegister()" type="submit" class="btn btn-success">Register</button>
						    </div>
						  </div>
					</div>
				</div>
			
			</li>

			<li class="dropdown'.$open[0].'" style="padding-right:20px; padding-bottom:2px; margin-top:-11px">		

       			<button class="btn btn-small btn-success dropdown-toggle" data-toggle="dropdown">Sign In <strong class="caret"></strong></button>
                <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px">

	                <form action="/functions/login.php" method="post" accept-charset="UTF-8">
    	                <input id="user_username" style="margin-bottom: 15px; height:30px;" type="text" name="user[username]" size="30" placeholder="User"  />
          	        	<input id="user_password" style="margin-bottom: 15px; height:30px;" type="password" name="user[password]" size="30" placeholder="Password" />
            	        '.$open[1].'
                    	<input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
        	        </form>
       			</div> 								
	        </li> 
				
				';

	}
	return $layout;
}


function navbar($id) {
		$sport = '';
		$zones = '';
		if ($id == "user") {
			$sport = '<li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                        Sports
	                        <span class="caret"></span>
	                    </a>
	                    <ul class="dropdown-menu" >
	                        <li>
			                    <a href="#" onclick="loadCycle()">Cycling </a>
	                        </li>
	                        <li>
			                    <a href="#" onclick="loadRoller()">RollerBlading</a>
	                        </li>
	                        <li>
			                    <a href="#" onclick="loadRun()" >Running</a>
	                        </li>
	                        
	                    </ul>
	            	</li> ';
	        $zones = '
	        		<li>	        		
	                    <a href="#" onclick="loadZones()">Zones</a>
	                </li>';
	        	
	     } 
	
		$log = 0;
		if (isset($_GET["log"])) $log = 1;	
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

		$login_layout = print_loggin_layout($log);
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
	                	            <a href="#" onclick="loadHome()">Home</a>
	                	        </li>
			                    <li>
			                        <a href="#" onclick="loadRoutes()">Routes</a>
			                    </li>
			                    <li>
			                    	<a href="#" onclick="loadEvents()">Events</a>
			                    </li>'
			                    .$sport.$zones.'

			                    
	                        </ul>  
	                    </div><!--/.nav-collapse -->  
	                </div><!--/.container-fluid -->   
	            </div><!--/.navbar-inner -->
	        </div><!--/.navbar navbar-inverse -->
	        </div>';

		echo $navBars;
	
}

function getZones() {
	require_once("../src/ZonaDbHelper.php");
	$zones = GetZonasDB();
	return $zones;
}

function getRoutes() {
	require_once("../src/Ruta.php");
	$ruta = new Ruta;
	$routes = $ruta->getRutas();
	return $routes;
}

function deparsingGeoPoints($geopoints) {
	$geos = array();
	foreach ($geopoints as $value) {
		$aux = explode(',',$value);				
		$i = 0;
		foreach ($aux as $key => $value) {
			if ($value != "") {
				$val = floatval($value)/1000000;
				if (intval($key)%2 == 0) {
					$geos[$i]['lat'] = $val;
				}
				else {
					$geos[$i]['long'] = $val;			
					++$i;
				}
			}
		}
	}	
	return $geos;
}

function getMiddleGeoPoint($zone) {	
	require_once("../src/ZonaDbHelper.php");
	$geopoints = getRoutesZones($zone);
	$geos = deparsingGeoPoints($geopoints);
	$lat = 0;$long = 0; $i = 0;
	foreach ($geos as $point) {		
		$lat += $point['lat'];
		$long += $point['long'];
		$i++;
	}
	$result = array("lat" => 41.38912, "long" => 2.1672);
	if ($i != 0) {
		$result = array("lat"  => $lat/$i,
						"long" => $long/$i);
	}	
	return $result;
}

function getGeosOfRoute($route) {
	require_once("../src/RutaDbHelper.php");
	$id = GetRutaID_BD($route);
	$geopointsDB = GetGeoPoints_BD($id);
	$geos = deparsingGeoPoints($geopointsDB);	
	return $geos;
}

?>