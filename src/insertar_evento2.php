<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $name = $_POST["name"];
    $name_ruta = $_POST["form_ruta"];
    $descripcion = $_POST["descripcion"];
    
    include ("Ruta.php");
    $ruta = new Ruta();
    $aux= $ruta->GetRutaID($name_ruta);
    
    include("Evento.php");
    $evento = new Evento();
    
    $res = $evento->CreateEvento($name, $aux, $descripcion);
    echo ' <html>
            <head></head>
            <body>
            <h3>El evento ha sido guardado</h3>
            <a href="javascript:history.back(1)"><b>Home</b></a>
            </body>
            </html> ';
?>
