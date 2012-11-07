<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    function CreateRutaBD($name, $longitud, $desnivel, $dificultad) {
      
      include"conexion.php";
      $sql = "INSERT INTO routes (ID, Name, Longitud, Desnivel, Dificultad) VALUES ('NULL', '$name', '$longitud', '$desnivel', '$dificultad')";
      mysql_query($sql) or die(mysql_error());
               
      include "cerrar_conexion.php"; 
      return 0;
   }
   
   function GetRutaInfoDB($name) {
        
        include_once "Ruta.php";
        $ruta = array(); //new User($nickname);
        
        include"conexion.php";
        $result = mysql_query("SELECT * FROM routes WHERE Name = '$name'") or die (mysql_error()); 
        $aux = mysql_num_rows($result);
        if ($aux == 1){
            $res = mysql_fetch_assoc($result);
            $ruta[0] =$res['Name'];
            $ruta[1] = $res['Longitud'];
            $ruta[2] = $res['Desnivel'];
            $ruta[3] = $res['Dificultad'];
            
            return $ruta;
        }
    }
    
    function GetRutasDB() {
        include"conexion.php";
        $result = mysql_query("SELECT * FROM routes") or die (mysql_error()); 
        $aux = mysql_num_rows($result);
        $ruta = array();    
        if ($aux > 0) {
                $i = 0;
                while ($res2 =mysql_fetch_assoc($result)) {
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
        $result = mysql_query("SELECT ID FROM routes WHERE Name='$name'") or die (mysql_error());
        while ($res2 =  mysql_fetch_assoc($result)) {
            $aux = $res2['ID'];
        }
        
        return $aux;
    }
     
?>
