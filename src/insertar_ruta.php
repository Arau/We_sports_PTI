<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $name = $_POST["name"];
    $longitud = $_POST["longitud"];
    $sport = $_POST["sport"];
    $dificultad = $_POST["dificultad"];
    $owner = $_POST["owner"];
    $time_estimado = $_POST["time"];
    $geopoints = $_POST["geopoints"];
    $fecha = $_POST["fecha"];
    
    
    include("Ruta.php");
    $ruta = new Ruta();
    $res = $ruta->CreateRuta($name, $owner, $longitud, $dificultad, $time_estimado, $geopoints, $sport, $fecha);
    echo ' <html>
            <head></head>
            <body>
            <h3>La ruta ha sido guardada</h3>
            <a href="javascript:history.back(1)"><b>Home</b></a>
            </body>
            </html> ';
?>
