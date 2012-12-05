<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $name_event = $_POST["name"];
    $name_ruta = $_POST["form_ruta"];
    $sport = $_POST["sport"];
    $description = $_POST["descripcion"];
    $departure = $_POST["departure"];
    $distcheckpoints = $_POST["distcheckpoints"];
    
    //---------------------Coger propietario de la sesion ---------------
    $owner = 1;
    
    //--------------------------------------------------------
    
    
    include ("Ruta.php");
    $ruta = new Ruta();
    $aux= $ruta->GetRutaID($name_ruta);
    
    include("Evento.php");
    $evento = new Evento();
    
    $res = $evento->CreateEvento($name_event, $aux, $sport, $owner, $description, $departure, $distcheckpoints);
    echo ' <html>
            <head></head>
            <body>
            <h3>El evento ha sido guardado</h3>
            <a href="javascript:history.back(1)"><b>Home</b></a>
            </body>
            </html> ';
?>
