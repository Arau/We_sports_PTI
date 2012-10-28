<?php
 
function print_loggin_layout($logged) {
	$username = "Pepe"; // cal aconseguir uname session_start() , etc
	if ($logged == 1) {
		$layout = '
				<li style="color:#5ccc00"><b>'.$username.'</b></li>				
				<li class="divider-vertical"></li>
				<li> <a href="/users/sign_up">Sign Up</a></li>
				';
	}	
	else {
		$layout = '


			<li style=" margin-top:-11px; margin-right:6px">											
				<button class="btn btn-small"> Register </button>
			</li>

			<li class="dropdown"  style="padding-right:20px; padding-bottom:2px; margin-top:-11px">				
	       			<button class="btn btn-small btn-success dropdown-toggle" data-toggle="dropdown">Sign In <strong class="caret"></strong></button>
	                <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px">

    	                <form action="./functions/login.php" method="post" accept-charset="UTF-8">
        	                <input id="user_username" style="margin-bottom: 15px" type="text" name="user[username]" size="30" />
	          	        	<input id="user_password" style="margin-bottom: 15px" type="password" name="user[password]" size="30" />
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
