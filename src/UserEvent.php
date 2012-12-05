<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserEvent
 *
 * @author Victor
 */
class UserEvent {
    public $userID;
    public $eventID;
    public $userrouteID;
    public $timecheckpoints;
    public $end_time;
    
    function __construct() {
       
    }
    
    function GetEventosUser($nick_user) {
        include_once ("User.php");
            $aux_user = new User();
            $aux_iduser = $aux_user->GetID_name($nick_user);    
            $info = array();
            include_once ("UserEventDbHelper.php");
            $tmp = new UserEventDbHelper();
            $info= $tmp->GetEventosUserDB($aux_iduser);
            return $info;     
    }
    
    function SetEventUser($name_user, $name_event, $checkpoints, $end_time) { //tiempo:string checkpoints
        include_once ("User.php");
        $user_aux = new User();
        $id_user = $user_aux->GetID_name($name_user); // obtengo ID de usuario
        
        include_once ("Evento.php");
        $aux_event = new Evento();
        $id_event= $aux_event->GetEventoID($name_event); // obtengo ID del evento
        $info_event = $aux_event->GetEventoInfo($id_event); // obtengo array con info de event
        $id_ruta = $info_event[1]; 
        $date = $info_event[5];
        
        include_once ("UserRoute.php");
        $new_user_route = new UserRoute();
        $id_userroute =$new_user_route->CreateRutaUser($id_user, $id_ruta, $date, $end_time);  // introducir en useruta
        
                
        include_once ("UserEventDbHelper.php");
        $tmp = new UserEventDbHelper();
        $result = $tmp->SetEventUserBD($id_user, $id_event, $id_userroute, $checkpoints, $end_time);
        if ($result != -1) return 1;
        else return -1;
    }
}

?>
