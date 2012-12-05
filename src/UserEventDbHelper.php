<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserEventDbHelper
 *
 * @author Victor
 */
class UserEventDbHelper {
    function GetEventosUserDB($id_user) {
        include"conexion.php";
        $result = $mysqli->query("SELECT * FROM UserEvent WHERE Uid = '$id_user'") or die ($mysqli_error); 
        $aux = $result->num_rows;
        $eventouser = array();    
        $aux_event = new Evento();
        if ($aux > 0) {
                $i = 0;
                while ($res2 = $result->fetch_assoc()) {
                    $aux = $res2['Eid'];
                    $aux_event = 
                    $eventouser[$i][0] = $res2['Eid'];
                    $eventouser[$i][1] = $res2['Urid'];
                    ++$i;
                }
        }
        else $eventouser[0][0] = -2 ;   
        include ("cerrar_conexion.php");
        return $eventouser;
    }
    
    function SetEventUserBD($iduser, $idevent, $id_userroute, $checkpoints, $end_time) {
      
      include"conexion.php";
      $sqli = "INSERT INTO UserEvent (Uid, Eid, Urid, TimeCheckpoints, endtime) VALUES ('$iduser', '$idevent', '$id_userroute', '$checkpoints', '$end_time')";
      $mysqli->query($sqli) or die($mysqli->error);
               
      include "cerrar_conexion.php"; 
      return 0;
   }
}

?>
