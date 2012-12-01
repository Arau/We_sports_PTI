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
    public $ruta;
    public $descripcion;
        
    function __construct() {
       
    }
    
    function CreateEvento($name, $ruta, $descripcion) {
        include_once ("EventoDbHelper.php");
        $result = CreateEventoBD($name, $ruta, $descripcion);
            if ($result != -1) return 1;
            else return -1;
    }
    
    function GetEventos() {
            include_once ("EventoDbHelper.php");
            $info = array();
            $info= GetEventosDB();
            return $info;     
    }
}

?>
