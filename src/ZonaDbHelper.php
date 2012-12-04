<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    function CreateZonaBD($name) {
      include"conexion.php";
      $sqli = "INSERT INTO zones (ID, Name) VALUES ('NULL', '$name')";
      $mysqli->query($sqli) or die($mysqli->error);
               
      include "cerrar_conexion.php"; 
      return 0;
    }
    
    
    function GetZonasDB() {
        include"conexion.php";
        $result = $mysqli->query("SELECT * FROM Zones") or die ($mysqli->error); 
        $aux = $result->num_rows;
        $zonas = array();    
        if ($aux > 0) {
                $i = 0;
                while ($res2 = $result->fetch_assoc()) {
                    $zonas[$i] = $res2['Name'];
                    ++$i;
                }
            }
            include ("cerrar_conexion.php");
            return $zonas;
    } 

    function GetRoutesZones($zone) {
        include"conexion.php"; 
        $sql=" SELECT `ID_Route` FROM `ZonesRoutes` WHERE `ID_Zone` =".$zone;              
        $result = $mysqli->query($sql) or die ($mysqli->error); 
        $aux = $result->num_rows;        
        $res = array();    
        if ($aux > 0) {
                $i = 0;                
                while ($i < $aux) {                    
                    $res2 = $result->fetch_assoc();                    
                    $res[$i] = $res2["ID_Route"];
                    ++$i;
                }
        }        
       
        $final_res = array();        
        foreach ($res as $id_value) {
            $sql = "SELECT Geopoints FROM Routes WHERE ID =".$id_value;
            
            $result = $mysqli->query($sql) or die ($mysqli->error);
            $aux = $result->num_rows;
            if ($aux > 0) {
                $i = 0;
                while ($res2 = $result->fetch_assoc()) {                    
                    $final_res[$i] = $res2['Geopoints'];
                    ++$i;
                }
            }
        }        
        include ("cerrar_conexion.php");        
        return $final_res;
    }
?>