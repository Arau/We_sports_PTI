<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $nickname = $_POST["nombre"];
    $password = $_POST["password"];
       
    include ("User.php");
    $user = new User($nickname);
    $result= $user->GetLogin($nickname, $password);
        
    if($result != -1) { // si login correcto
        //echo 'Login Correcto!';
        $user->GetUserInfo($nickname);
               
        echo '
            <html>
            <head></head>
            <body>
            <h3>Usuario: </h3>
            <p> Nombre:  ', $user->nickname,'<br>
            </p>
            <p> Mail:  ', $user->mail,'<br>
            </p>
            <p> Nivel:  ', $user->level,'<br>
            </p>
            </body>
            </html> '; 
            
            echo 'Deportes: ';
            $aux = $user->GetDeportes();
            for ($i=0; $i < sizeof($aux); ++$i) {
                if($aux[$i] == 1) echo 'Running ';
                else if ($aux[$i] == 2) echo 'Ciclimo ';
                else echo 'Patinaje ';
                if ($i < (sizeof($aux)-1)) echo ', ';
            }
            echo '
                <html>
                <head></head>
                <body><br><br><br>
                <a href="insertar_ruta.html">Crear Ruta</a><br>
                <a href="mostrar_rutas.php">Ver todas las rutas</a><br>
                <a href="insertar_zona.html">Crear Zona</a><br>
                <a href="mostrar_zonas.php">Ver todas las zonas</a><br>
                <a href="insertar_evento.php">Crear Evento</a><br>
                <a href="mostrar_eventos.php">Ver todos los eventos</a><br>
                <a href="index.php">Logout</a></td>
                </body>
                </html> ';  
     }
     else {
         echo '
            <html>
            <body>
            <div>Usuario o password erroneos</div><br>
            <a href="index.php"><b>Inicio</b></a></td>
            </body>
            </html>';
     }
        
?>
