<?php

	require_once('../src/User.php');	
	$lifetime = 7200;
	if (isset($_POST['user']['remember_me'])) {
		$lifetime *= 12;
	}

	ini_set("session.gc_maxlifetime", $lifetime);
	session_start();
	setcookie(session_name(),session_id(),time()+$lifetime);		
	
	if (empty($_POST['user']['username']) || empty ($_POST['user']['password'])) {
			
	}
	else {
		$nickname   = $_POST['user']['username'];
		$passwd = $_POST['user']['password'];
			
		$user_instance = new User($nickname);									
		$crypt_passwd = hash('sha512',$passwd);		


		$login = $user_instance->GetLogin($nickname, $crypt_passwd);
		
		if ($login == 0) {
			$_SESSION['user'] = $nickname;	
			$_SESSION['logged'] = 1;
			header( 'Location: http://friendsandsport.com/views/userpage.php');
		}
		else {
			header( 'Location: http://friendsandsport.com/index.php?log=0') ;
		}
	}					
	
?>
