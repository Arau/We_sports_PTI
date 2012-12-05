<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $string=  $_GET['option'];
    $key="proyectopti";
    echo $string;
    $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "\0"); ;
    echo "-->",$decrypted;
    
    include_once ("Evento.php");
    $aux_event = new Evento();
    $id_event = $aux_event->GetEventoID($decrypted); // obtengo el ID del event
    
    ////ID user lo tenemos que coger de la sesion
    $id_user = 5;
    ///////////////////
   
    include_once ("UserEventInsc.php");
    $event_insc = new UserEventInsc();
    $result = $event_insc->CreateEventInsc($id_user, $id_event);
    if ($result != -1) echo "Ya estas inscrito al evento: ", $decrypted;
    else echo "Error al inscribirte en este evento";
?>
