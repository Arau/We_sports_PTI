<?php
 
function print_loggin_layout($log) {	
		
	if (isset($_SESSION['logged']) and $_SESSION['logged'] == 1) {
		$user = $_SESSION['user'];
		var_dump($user);
		$layout = '
				<li style="color:#5ccc00"><b>'.$_SESSION['username'].'</b></li>				
				<li class="divider-vertical"></li>
				<li style="color:white">'.$user.'</a></li>
				';
	}	
	else {		  			
		$open = array('','');
		var_dump($log);
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

	                <form action="./functions/login.php" method="post" accept-charset="UTF-8">
    	                <input id="user_username" style="margin-bottom: 15px" type="text" name="user[username]" size="30" placeholder="User"  />
          	        	<input id="user_password" style="margin-bottom: 15px" type="password" name="user[password]" size="30" placeholder="Password" />
            	        '.$open[1].'
                    	<input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
        	        </form>
       			</div> 								
	        </li> 
				
				';

	}
	return $layout;
}


?>
