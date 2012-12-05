<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserEventInsc
 *
 * @author Victor
 */
class UserEventInsc {
    
     function __construct() {
       
    }
    
    function CreateEventInsc($id_user, $id_event) {
        include_once ("UserEventInscDbHelper.php");
        $result = CreateEventInscBD($id_user, $id_event);
            if ($result != -1) return 1;
            else return -1;
    }
    
    function CreateEventInscMovil($name_user, $name_event) {
        include_once ("UserEventInscDbHelper.php");
        
        include_once ("User.php");
        $aux_user = new User();
        $id_user = $aux_user->GetID_name($name_user); // traducimos de name a ID
        
        include_once ("Evento.php");
        $aux_event = new Evento();
        $id_event = $aux_event->GetEventoID($name_event); // traducimos de name a ID
        
        $result = CreateEventInscBD($id_user, $id_event);
        if ($result != -1) return 1;
        else return -1;
    }
     
}

?>
