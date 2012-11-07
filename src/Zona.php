<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Zona
 *
 * @author Victor
 */
class Zona {
    public $name;
    
    function __construct() {
        
    }
    
    function CreateZona($name) {
        include_once ("ZonaDbHelper.php");
        $result = CreateZonaBD($name);
            if ($result != -1) return 1;
            else return -1;
    }
    
    function GetZonas() {
        $zonas = array();
        include ("ZonaDbHelper.php");
        $zonas = GetZonasDB();
        return $zonas;
    }
}

?>
