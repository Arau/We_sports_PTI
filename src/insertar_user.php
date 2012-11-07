<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
   

      $nickname = $_POST["nombre"];
      $password = $_POST["password"];
      $mail = $_POST["mail"];
      $level = $_POST["form_level"];
      $running = "off";
      $ciclismo = "off";
      $patinar = "off";
      
      if (isset($_POST['running']))  $running = "on";
      if (isset($_POST['ciclismo']))  $ciclismo = "on";
      if (isset($_POST['patinaje']))  $patinar = "on";
      
      if ($level == "Principiante") $level = 1;
      else if ($level == "Medio") $level = 2;
      else $level = 3;
      
      include("User.php");
      $user = new User($nickname);
      $res = $user->CreateUser($nickname, $password, $mail, $level, $running, $ciclismo, $patinar);
      
      if($res != -1) {
        echo ' <html>
            <head></head>
            <body>
            <h3>Los datos han sido guardados</h3>
            <a href="index.php"><b>Inicio</b></a>
                
            </body>
            </html> ';
      }
      else echo "Error al registrar con la base de datos"
      
?>
