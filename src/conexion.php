<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */		
    $dbhost="localhost";  // host del MySQL (generalmente localhost)
    $dbusuario="root"; // aqui debes ingresar el nombre de usuario
                      // para acceder a la base
    $dbpassword=""; // password de acceso para el usuario de la
                      // linea anterior
    $db="db43726746";        // Seleccionamos la base con la cual trabajar
    $conexion = mysql_connect($dbhost, $dbusuario, $dbpassword); // obtenemos las bases de datos
    if (!$conexion) {
        echo "Error al conectar con la base de datos";
        exit;
    }
    
     mysql_select_db($db, $conexion) or die(mysql_error()); // seleccionamos la base de datos db43726746

          
?>
