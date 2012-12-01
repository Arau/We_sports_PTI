<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $nickname = $_POST["nombre"];
    $password = $_POST["password"];
       
    include ("User.php");
    $user = new User($nickname);
    $cifrado = hash("sha512", $password);
    $result= $user->GetLogin($nickname, $cifrado);
    
    if($result != -1) { // si login correcto
        //echo 'Login Correcto!';
        $user->GetUserInfo($nickname);
               
        echo '
            <html>
            <head></head>
            <body>
            <h3>Usuario: ', $user->nickname,' </h3>
            <p> Ver Perfil:  ', $user->nickname,'<br>
            </p>
            <p> Editar Perfil:  ', $user->mail,'<br>
            </p>
            </body>
            </html> '; 
            
            $string="propietario**1$\$id**".$user->GetNickname();
            $key="proyectopti";
            
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
                <a href="mostrar_user.php?option='.base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key)))).'">Mi perfil</a><br>
                <a href="editar_user.php?option='.base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key)))).'">Editar perfil</a><br>
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
