<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
   

      $nickname = $_POST["nombre"];
      $password = hash("sha512", $_POST["password"]);
      $mail = $_POST["mail"];
      $running = array("off", 0);
      $ciclismo = array("off", 0);
      $patinar = array("off", 0);
      
      
      if (isset($_POST['running'])) {
          $running[0] = "on";
          $running[1] = $_POST["form_running"];
      }
      if (isset($_POST['ciclismo'])) {
          $ciclismo[0] = "on";
          $ciclismo[1] = $_POST["form_ciclismo"];
      }
      if (isset($_POST['patinaje'])) {
          $patinar[0] = "on";
          $patinar[1] = $_POST["form_roller"];
      }
      
          
      include("User.php");
      $user = new User();
      $res = $user->CreateUser($nickname, $password, $mail, $running, $ciclismo, $patinar);
      
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
