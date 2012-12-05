<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function CreateEventoBD($name, $ruta, $sport, $owner, $description, $departure, $distancecheckpoints) {
         
      $time = strtotime($departure);
      $myDate = date('y-m-d h:i:s', $time);
      include"conexion.php";
      $sqli = "INSERT INTO Events (ID, Name, Route, Sport, Owner, Description, Departure, DistanceCheckpoint) VALUES ('NULL', '$name', '$ruta', '$sport', '$owner', '$description', '$myDate', $distancecheckpoints)";
      $mysqli->query($sqli) or die($mysqli->error);
      
      include "cerrar_conexion.php"; 
      return 0;
   }
   
      
   function GetEventoInfoDB($name) {
        include_once "Evento.php";
        $evento = array();
        
        include"conexion.php";
        $result = $mysqli->query("SELECT * FROM Events WHERE Name = '$name'") or die ($mysqli->error); 
        $aux = $result->num_rows;
        if ($aux == 1){
            $res = $result->fetch_assoc();
            $evento[0] =$res['Name'];
            $evento[1] = $res['Route'];
            $evento[2] = $res['Sport'];
            $evento[3] = $res['Owner'];
            $evento[4] = $res['Description'];
            $evento[5] = $res['Departure'];
            $evento[6] = $res['DistanceCheckpoint'];
            include "cerrar_conexion.php"; 
            return $evento;
        }
    }
    
    function GetEventosDB() {       
        include"conexion.php";

        $result = $mysqli->query("SELECT * FROM Events") or die ($mysqli->error); 
        $aux = $result->num_rows;
        $evento = array();    
        if ($aux > 0) {
                $i = 0;
                while ($res2 = $result->fetch_assoc()) {
                    $evento[$i] = $res2;
                    ++$i;
                }
            }
            include ("cerrar_conexion.php");
            return $evento;    
    }
    
    
    function GetEventoID_BD($name_event) {
        include"conexion.php";
        $result = $mysqli->query("SELECT ID FROM Events WHERE Name = '$name_event'") or die ($mysqli->error); 
        $aux = $result->num_rows;
        
        if ($aux == 1){
            $res = $result->fetch_assoc();
            $aux =$res['ID'];
            include "cerrar_conexion.php"; 
            return $aux;
        }
        include "cerrar_conexion.php"; 
        return -1;;
    }
    
    function GetEventoName_BD($id_event) {
        include"conexion.php";
        $result = $mysqli->query("SELECT Name FROM Events WHERE ID = '$id_event'") or die ($mysqli->error); 
        $res = $result->fetch_assoc();
        $aux =$res['Name'];
        include "cerrar_conexion.php"; 
        return $aux;
        
    }
    
?>
