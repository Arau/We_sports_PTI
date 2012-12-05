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
            
            $string="propietario**1$\$nick**".$user->GetNickname()."$\$id**".$user->GetID();
            //$string="propietario**1$\$id**".$user->GetNickname();
            $key="proyectopti";
            
            //echo $string;
            //$aux2 = urldecode($string);
            //echo $aux2;
            //<a href="mostrar_rutas_user.php?option='.str_replace('+','quotesmorequotes',base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))))).'">Tus rutas</a><br>
            echo '
                <html>
                <head></head>
                <body><br><br><br>
                <a href="insertar_ruta.html">Crear Ruta</a><br>
                <a href="insertar_ruta_user.html">Crear Ruta Usuario</a><br>
                <a href="mostrar_rutas.php">Ver todas las rutas</a><br>
                
                <a href="mostrar_rutas_user.php?option='.urlencode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))))).'">Tus rutas</a><br>
                <a href="insertar_zona.html">Crear Zona</a><br>
                <a href="mostrar_zonas.php">Ver todas las zonas</a><br>
                <a href="insertar_evento.php?">Crear Evento</a><br>
                <a href="insertar_evento_user.html">Crear evento realizado</a><br>
                <a href="mostrar_eventos.php">Ver todos los eventos</a><br>
                
                <a href="mostrar_eventos_user.php?option='.urlencode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))))).'">Tus Eventos realizados</a><br>
                <a href="mostrar_eventos_user_insc.php?option='.urlencode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))))).'">Tus Eventos inscritos</a><br>
                    
                <a href="mostrar_user.php?option='.urlencode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))))).'">Mi perfil</a><br>
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
