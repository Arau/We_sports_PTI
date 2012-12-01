<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function CreateEventoBD($name, $ruta, $descripcion) {
      
      include"conexion.php";
      $sqli = "INSERT INTO events (ID, Name, Route, Description) VALUES ('NULL', '$name', '$ruta', '$descripcion')";
      $mysqli->query($sqli) or die($mysqli->error);
               
      include "cerrar_conexion.php"; 
      return 0;
   }
   
   function GetEventoInfoDB($name) {
        include_once "Evento.php";
        $evento = array();
        
        include"conexion.php";
        $result = $mysqli->query("SELECT * FROM events WHERE Name = '$name'") or die ($mysqli->error); 
        $aux = $result->num_rows();
        if ($aux == 1){
            $res = $result->fetch_assoc();
            $evento[0] =$res['Name'];
            $evento[1] = $res['Route'];
            $evento[2] = $res['Description'];
            return $evento;
        }
    }
    
    function GetEventosDB() {
        include"conexion.php";
        $result = $mysqli->query("SELECT * FROM events") or die ($mysqli_error); 
        $aux = $result->num_rows;
        $evento = array();    
        if ($aux > 0) {
                $i = 0;
                while ($res2 = $result->fetch_assoc()) {
                    $evento[$i] = $res2['Name'];
                    ++$i;
                }
            }
            include ("cerrar_conexion.php");
            return $evento;
    }
?>
