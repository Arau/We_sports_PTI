<?php
	$sports = json_decode($_POST["sport"]);
	$nickname = $_POST["name"];
      $password = hash("sha512", $_POST["pwd"]);
      $mail = $_POST["mail"];
      $running = array("off", 0);
      $ciclismo = array("off", 0);
      $patinar = array("off", 0);
      	  	  
      
		  $running[0] = "on";
		  if ($sports[2][0] == 1) $running[1] = 1;
		  else if ($sports[2][1] == 1) $running[1] = 2;
		  else if ($sports[2][2] == 1) $running[1] = 3;
		else $running[0] = "off";
	  
      
      $ciclismo[0] = "on";
          if ($sports[0][0] == 1) $ciclismo[1] = 1;
		  else if ($sports[0][1] == 1) $ciclismo[1] = 2;
		  else if ($sports[0][2] == 1) $ciclismo[1] = 3;
      else $cycling[0] = "off";
      
      $patinar[0] = "on";
          if ($sports[1][0] == 1) $patinar[1] = 1;
		  else if ($sports[1][1] == 1) $patinar[1] = 2;
		  else if ($sports[1][2] == 1) $patinar[1] = 3;
      else $roller[0] = "off";
      
          
      include_once("../src/User.php");
      $user = new User();
      $res = $user->CreateUser($nickname, $password, $mail, $running, $ciclismo, $patinar);	  	  	 
	
?>
