<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
   
    function CreateRutaBD($name, $longitude, $sport, $difficulty, $owner, $time, $geopoints) {
      
      include"conexion.php";
      $sqli = "INSERT INTO Routes (`ID`, `Name`, `Longitud`, `Sport`, `Dificultad`, `Propietario`, `Time`, `Geopoints`) VALUES (NULL, '$name', '$longitude', '$sport', '$difficulty', '$owner', '$time', '$geopoints' )";
	  $mysqli->query($sqli) or die($mysqli->error);
      include "cerrar_conexion.php"; 
      return 0;
   }
   
   function GetRutaInfoDB($name) {
        
        include_once "Ruta.php";
        $ruta = array(); //new User($nickname);
        
        include "conexion.php";
        $result = $mysqli->query("SELECT * FROM routes WHERE Name = '$name'") or die ($mysql->error); 
        $aux = $result->num_rows;
        if ($aux == 1){
            $res = $result->fetch_assoc();
            $ruta[0] =$res['Name'];
            $ruta[1] = $res['Longitud'];
            $ruta[2] = $res['Desnivel'];
            $ruta[3] = $res['Dificultad'];
            
            return $ruta;
        }
    }
    
    function GetRutasDB() {
        include"conexion.php";
        $result = $mysqli->query("SELECT * FROM routes") or die ($mysqli->error()); 
        $aux = $result->num_rows;
        $ruta = array();    
        if ($aux > 0) {
                $i = 0;
                while ($res2 = $result->fetch_assoc()) {
                    $ruta[$i] = $res2['Name'];
                    ++$i;
                }
            }
            include ("cerrar_conexion.php");
            return $ruta;
    }
    
    function GetRutaID_BD($name) {
        include"conexion.php";
        $aux;
        $result = $mysqli->query("SELECT ID FROM routes WHERE Name='$name'") or die ($mysqli->error);
        while ($res2 =  $result->fetch_assoc()) {
            $aux = $res2['ID'];
        }
        
        return $aux;
    }
	
     
?>
