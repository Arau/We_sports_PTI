<?php
 
function print_loggin_layout() {	
		
	if (isset($_SESSION['logged']) and $_SESSION['logged'] == 1) {
		$layout = '
				<li style="color:#5ccc00"><b>'.$_SESSION['username'].'</b></li>				
				<li class="divider-vertical"></li>
				<li> <a href="/users/sign_up">Sign Up</a></li>
				';
	}	
	else {		  		
		$register_form = '
		
		<form class="form-horizontal" method="post" action="">
		  <div class="control-group">
		     <label class="control-label">Name</label>
		    	<div class="controls"> 
    				<input type="text" id="name_reg" placeholder="Name">
    			</div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="inputEmail">Email</label>
		    <div class="controls">
		      <input type="text" id="mail_reg" placeholder="Email">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="inputPassword">Password</label>
		    <div class="controls">
		      <input type="password" id="pwd_reg" placeholder="Password">
		  	</div>
		  </div>		  
		  <div class="control-group">
		  	  <label class="control-label">Sport</label>
		  	  <div class="controls">
				  <div class="btn-group" data-toggle="buttons-checkbox">
					  <button id="t" onclick="cycl()" type="button" class="btn btn-small btn-info">Cycling</button>
					  <button onclick="roller()" type="button" class="btn btn-small btn-info">Roller</button>
					  <button onclick="running()" type="button" class="btn btn-small btn-info">Running</button>
				  </div>
			  </div>
		  </div>
		  <div class="control-group">
		  	  <label class="control-label">Sport Level</label>
		  	  <div class="controls">
				  <div class="btn-group" data-toggle="buttons-radio">
					  <button onclick="beginer()" type="button" class="btn btn-small">Beginer</button>
					  <button onclick="amateur()" type="button" class="btn btn-small">Amateur</button>
					  <button onclick="expert()" type="button" class="btn btn-small">Expert</button>
				  </div>
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

			<li class="dropdown"  style="padding-right:20px; padding-bottom:2px; margin-top:-11px">		

       			<button class="btn btn-small btn-success dropdown-toggle" data-toggle="dropdown">Sign In <strong class="caret"></strong></button>
                <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px">

	                <form action="./functions/login.php" method="post" accept-charset="UTF-8">
    	                <input id="user_username" style="margin-bottom: 15px" type="text" name="user[username]" size="30" placeholder="User"  />
          	        	<input id="user_password" style="margin-bottom: 15px" type="password" name="user[password]" size="30" placeholder="Password" />
            	        <input id="user_remember_me" style="float: left; margin-right: 10px;" type="checkbox" name="user[remember_me]" value="1" />
                	    <label class="string optional" for="user_remember_me"> Remember me</label>
           
                    	<input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
        	        </form>
       			</div> 								
	        </li> 
				
				';

	}
	return $layout;
}


?>
