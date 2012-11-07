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
    public $longitud;
    public $desnivel;
    public $dificultad;
    
    function __construct() {
       
    }
    
    function CreateRuta($name, $longitud, $desnivel, $dificultad) {
        include_once ("RutaDbHelper.php");
        $result = CreateRutaBD($name, $longitud, $desnivel, $dificultad);
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
        include ("RutaDbHelper.php");
        $aux = GetRutaID_BD($name);
        return $aux;
    }
}

?>
