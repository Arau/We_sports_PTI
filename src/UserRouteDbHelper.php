<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    function CreateRutaUserBD($id_user, $id_ruta, $end_time) {
      $myDate = date('y-m-d H:i:s');
      include"conexion.php";
	  if(strlen($end_time)==5)$end_time="00:".$end_time;
      $sqli = "INSERT INTO UserRoutes (`Urid`, `Uid`, `Rid`, `Date`, `Time`) VALUES ('NULL','$id_user', '$id_ruta', '$myDate', '$end_time')";
	  $mysqli->query($sqli) or die($mysqli->error);
         
          $idrutauser = $mysqli->insert_id; // obtengo el ID del ultimo sinsertado
              
      include "cerrar_conexion.php"; 
      return $idrutauser; // devuelvo el id del userruta
   }

    function GetRutasUserDB($id_user) {
        include"conexion.php";
		include_once("../src/Ruta.php");
		
		$sql = "SELECT u.UName as User, r.Longitud as Dist, ur.Rid as Rid, ur.Date as Date, ur.Time as Time, r.Geopoints as Geopoints, r.Sport as Sport FROM UserRoutes  ur, Routes r, Users u WHERE u.ID = ur.Uid AND ur.Rid = r.ID AND Uid = '$id_user'";
        //echo $sql;
		$result = $mysqli->query($sql) or die ($mysqli->error()); 
        $aux = $result->num_rows;
        $ruta_aux = new Ruta(); //para obtener el nombre de la ruta realizada(pasandole el ID)
        $ruta = array();    
        if ($aux > 0) {
                $i = 0;
                while ($i<($result->num_rows)) {
					$res2 = $result->fetch_assoc();
                    $idruta_aux = $res2['Rid']; // convertimos el ID en el nombre de la ruta
                    $ruta[$i]["Name"] = $ruta_aux->GetRutaName($idruta_aux); //Nombre de la ruta
                    $ruta[$i]["Date"] = $res2['Date'];
					$ruta[$i]["Owner"] = $res2['User'];
					$ruta[$i]["Dist"] = $res2['Dist'];
                    $ruta[$i]["Time"] = $res2['Time'];	
					$ruta[$i]["Geopoints"] = $res2['Geopoints'];
					$ruta[$i]["Sport"] = $res2['Sport'];
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
