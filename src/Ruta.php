<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ruta
 *
 * @author Victor
 */
class Ruta {
    public $name;
    public $owner;
    public $longitude;
    public $difficulty;
    public $time;
    public $geopoints;
    public $sport;
    
    function __construct() {
       
    }
    
     
    function CreateRuta($name, $owner, $longitude, $difficulty, $time, $geopoints, $sport) { //
        include_once ("RutaDbHelper.php");
        $result = CreateRutaBD($name, $longitude, $sport, $difficulty, $owner, $time, $geopoints);
        
            if ($result != -1) return 1;
            else return -1;
    }
    
       
    function GetRutas() {
            include_once ("RutaDbHelper.php");
            $info = array();
            $info= GetRutasDB();
            return $info;     
    }
    
    function GetRutaInfo($name) {
            include_once ("RutaDbHelper.php");
            $info = array();
            $info= GetRutaInfoDB($name);
            $this->name = $info[0];
            $this->longitude = $info[1];
            $this->sport = $info[2];
            $this->difficulty = $info[3];
            $this->owner = $info[4];
            $this->time = $info[5];
            $this->geopoints = $info[6];
    }
    
    
    function GetRutaID($name) {
        include_once ("RutaDbHelper.php");
        $aux = GetRutaID_BD($name);
        return $aux;
    }
    
    function GetRutaName($idruta) {
        include_once ("RutaDbHelper.php");
        $aux = GetRutaName_BD($idruta);
        
        return $aux;
    }
    
}

?>
