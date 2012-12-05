<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    function CreateEventInscBD($id_user, $id_event) {
      include"conexion.php";
      $sqli = "INSERT INTO UserEventInsc (ID, Uid, Eid) VALUES ('NULL', '$id_user', '$id_event')";
      $mysqli->query($sqli) or die($mysqli->error);
      
      include "cerrar_conexion.php"; 
      return 0;
   }
?>
