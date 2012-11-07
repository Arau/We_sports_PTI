<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $name = $_POST["name"];
    $longitud = $_POST["longitud"];
    $desnivel = $_POST["desnivel"];
    $dificultad = $_POST["dificultad"];
     
    include("Ruta.php");
    $ruta = new Ruta();
    $res = $ruta->CreateRuta($name, $longitud, $desnivel, $dificultad);
    echo ' <html>
            <head></head>
            <body>
            <h3>La ruta ha sido guardada</h3>
            <a href="javascript:history.back(1)"><b>Home</b></a>
            </body>
            </html> ';
?>
