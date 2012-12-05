<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ("Evento.php");
    $evento = new Evento();
    $aux = array();
    $aux = $evento->GetEventos();
    $key = "proyectopti";
    
    for ($i=0; $i < sizeof($aux); ++$i) {
        $string = $aux[$i];
        echo '<div>', $aux[$i], '<a href="inscripcion_event.php?option='.urlencode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))))).'">Inscripcion</a><br></div><div>';
    }
    echo ' <html>
            <head></head>
            <body>
            <br><br>
            <a href="javascript:history.back(1)"><b>Home</b></a>
            </body>
            </html> ';
?>
