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
  include_once ("RutaDbHelper.php");
class Ruta {
    public $name;
    public $longitud;
    public $desnivel;
    public $dificultad;
    
    function __construct() {
       
    }
    
	function CreateRuta($name, $owner, $longitude, $difficulty, $time, $geopoints, $sport) {
       
        $result = CreateRutaBD($name, $longitude, $sport, $difficulty, $owner, $time, $geopoints);
            if ($result != -1) return 1;
            else return -1;
    }
	

    
    function GetRutas() {            
            $info = array();
            $info= GetRutasDB();
            return $info;     
    }
    
    function GetRutaInfo($name) {
           
            $info = array();
            $info= GetRutaInfoDB($name);
            $this->name = $info[0];
            $this->longitud = $info[1];
            $this->desnivel = $info[2];
            $this->dificultad = $info[3];
    }
    
    function GetZona() {
	return $this->zona;
    }
	
    function GetLongitud() {
		return $this->longitud;
    }
		
    function GetDesnivel() {
        return $this->desnivel;
    }
    
    function GetRutaID($name) {
    
        $aux = GetRutaID_BD($name);
        return $aux;
    }
}

?>
