<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    function CreateRutaUserBD($id_user, $id_ruta, $date, $end_time) {
      
      include"conexion.php";
      $sqli = "INSERT INTO UserRoutes (`Urid`, `Uid`, `Rid`, `Date`, `Time`) VALUES ('NULL','$id_user', '$id_ruta', '$date', '$end_time')";
	  $mysqli->query($sqli) or die($mysqli->error);
         
          $idrutauser = $mysqli->insert_id; // obtengo el ID del ultimo sinsertado
              
      include "cerrar_conexion.php"; 
      return $idrutauser; // devuelvo el id del userruta
   }

    function GetRutasUserDB($id_user) {
        include"conexion.php";
        $result = $mysqli->query("SELECT * FROM UserRoutes WHERE Uid = '$id_user'") or die ($mysqli->error()); 
        $aux = $result->num_rows;
        $ruta_aux = new Ruta(); //para obtener el nombre de la ruta realizada(pasandole el ID)
        $ruta = array();    
        if ($aux > 0) {
                $i = 0;
                while ($res2 = $result->fetch_assoc()) {
                    $idruta_aux = $res2['Rid']; // convertimos el ID en el nombre de la ruta
                    $ruta[$i][0] = $ruta_aux->GetRutaName($idruta_aux); //Nombre de la ruta
                    $ruta[$i][1] = $res2['Date'];
                    $ruta[$i][2] = $res2['Time'];
                    ++$i;
                }
            }
            include ("cerrar_conexion.php");
            return $ruta;
    }
    
    function GetRutaID_userroute_BD($userroute_id) {
        include"conexion.php";
        
        $result = $mysqli->query("SELECT Rid FROM UserRoutes WHERE Urid='$userroute_id'") or die ($mysqli->error);
        while ($res2 =  $result->fetch_assoc()) {
            $aux = $res2['Rid'];
        }
        include "cerrar_conexion.php"; 
        return $aux;
    }
?>
