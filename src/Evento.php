<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Evento
 *
 * @author Victor
 */
class Evento {
    public $name;
    public $route;
    public $sport;
    public $propietario;
    public $description;
    public $date;
    public $dist_checkpoints;
    
        
    function __construct() {
       
    }
    
    function CreateEvento($name, $ruta, $sport, $owner, $description, $departure, $distcheckpoints) {
        include_once ("EventoDbHelper.php");
        $result = CreateEventoBD($name, $ruta, $sport, $owner, $description, $departure, $distcheckpoints);
            if ($result != -1) return 1;
            else return -1;
    }
    
    function GetEventos() {
            include_once ("EventoDbHelper.php");
            $info = array();
            $info= GetEventosDB();
            return $info;     
    }
    
        
    function GetEventoInfo($id_event) {
        include_once ("EventoDbHelper.php");
            $info = array();
            $aux_name_event = GetEventoName_BD($id_event);
            $info = GetEventoInfoDB($aux_name_event);
            $this->name = $info[0];
            $this->ruta = $info[1];
            $this->sport = $info[2];
            $this->propietario = $info[3];
            $this->description = $info[4];
            $this->date = $info[5];
            $this->dist_checkpoints = $info[6];
            
            return $info;
    }
    
    function GetEventoID($name_event) {
            include_once ("EventoDbHelper.php");
            $res = GetEventoID_BD($name_event);
            return $res;     
    }
    
    function GetEventoName($id_event) {
            include_once ("EventoDbHelper.php");
            $res = GetEventoName_BD($id_event);
            return $res;     
    }
    
    
}

?>
