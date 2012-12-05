<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserRoute
 *
 * @author Victor
 */
class UserRoute {
    public $ID;
    public $userID;
    public $routeID;
    public $date;
    public $time;
        
    function __construct() {
       
    }
    
    function CreateRutaUser($id_user, $id_ruta, $date, $end_time) {
       include_once ("UserRouteDbHelper.php");
            $result = CreateRutaUserBD($id_user, $id_ruta, $date, $end_time);
            if ($result != -1) return $result; // retorno id del userruta
            else return -1;
    }
    
    function GetRutasUser($id_user) {
            include_once ("UserRouteDbHelper.php");
            $info = array();
            $info= GetRutasUserDB($id_user);
            return $info;     
    }
    
    function GetRutaID($userroute_id) {
        include_once ("UserRouteDbHelper.php");
            $ruta_id= GetRutaID_userroute_BD($userroute_id);
            return $ruta_id; 
    }
}

?>
