<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function CreateEventoBD($name, $ruta, $descripcion) {
      
      include"conexion.php";
      $sql = "INSERT INTO events (ID, Name, Route, Description) VALUES ('NULL', '$name', '$ruta', '$descripcion')";
      mysql_query($sql) or die(mysql_error());
               
      include "cerrar_conexion.php"; 
      return 0;
   }
   
   function GetEventoInfoDB($name) {
        
        include_once "Evento.php";
        $evento = array();
        
        include"conexion.php";
        $result = mysql_query("SELECT * FROM events WHERE Name = '$name'") or die (mysql_error()); 
        $aux = mysql_num_rows($result);
        if ($aux == 1){
            $res = mysql_fetch_assoc($result);
            $evento[0] =$res['Name'];
            $evento[1] = $res['Route'];
            $evento[2] = $res['Description'];
            return $evento;
        }
    }
    
    function GetEventosDB() {
        include"conexion.php";
        $result = mysql_query("SELECT * FROM events") or die (mysql_error()); 
        $aux = mysql_num_rows($result);
        $evento = array();    
        if ($aux > 0) {
                $i = 0;
                while ($res2 =mysql_fetch_assoc($result)) {
                    $evento[$i] = $res2['Name'];
                    ++$i;
                }
            }
            include ("cerrar_conexion.php");
            return $evento;
    }
?>
