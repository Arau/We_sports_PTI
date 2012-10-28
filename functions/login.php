<?php
	$lifetime = 7200;
	if (isset($_POST['user']['remember_me'])) {
		$lifetime *= 12;
	}

	ini_set("session.gc_maxlifetime", $lifetime);
	@session_start();
	setcookie(session_name(),session_id(),time()+$lifetime);

	if (empty($_POST['user']['username']) || empty ($passwd = $_POST['user']['password']) {
	
	}
	else {
		
	}
	
	
	
	
	
	==test and $_POST['password']==test){ 
	$_SESSION['usuario']=$_POST['usuario']; 
	$_SESSION['password']=$_POST['password'];  
echo 'Te haz loguedo como '.$_SESSION['usuario']; 
} 
	
	
?>
