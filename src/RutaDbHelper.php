<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    function CreateRutaBD($name, $longitude, $sport, $difficulty, $owner, $time, $geopoints, $date) {
      
      include"conexion.php";
      
      $sqli = "SELECT COUNT(*) as total FROM Routes WHERE Name = '$name'";        
        $result = $mysqli->query($sqli) or die($mysqli_error);        
        $fetch = $result->fetch_assoc();
        $existe = intval($fetch["total"]); 
        
        try{   

            if($existe == 0) { // si la ruta no existe la guardamos en routes
                $sqli = "INSERT INTO Routes (`ID`, `Name`, `Longitud`, `Sport`, `Dificultad`, `Propietario`, `Time`, `Geopoints`) VALUES (NULL, '$name', '$longitude', '$sport', '$difficulty', '$owner', '$time', '$geopoints' )";
                $mysqli->query($sqli) or die($mysqli->error);
                $ultimo_id_ruta = $mysqli->insert_id;
                               
            }
            // exista o no exista la ruta sempre la metemos en userroute
            include_once ("UserRoute.php");
            $aux_user_route = new UserRoute();
            
            //--------- Coger ID de Uuario de la sesion -------
            $id_user = 5; // de momento le metemos este ID
            $aux = $aux_user_route->CreateRutaUser($id_user, $ultimo_id_ruta, $date, $time);
                   
        }catch(Exception $error){}
         
      include "cerrar_conexion.php"; 
      return 0;
   }
   
   function GetRutaInfoDB($name) {
        
        include_once "Ruta.php";
        $ruta = array(); //new User($nickname);
        
        include "conexion.php";
        $result = $mysqli->query("SELECT * FROM Routes WHERE Name = '$name'") or die ($mysql->error); 
        $aux = $result->num_rows;
        if ($aux == 1){
            $res = $result->fetch_assoc();
            $ruta[0] =$res['Name'];
            $ruta[1] = $res['Longitud'];
            $ruta[2] = $res['Sport'];
            $ruta[3] = $res['Dificultad'];
            $ruta[4] = $res['Propietario'];
            $ruta[5] = $res['Time'];
            $ruta[6] = $res['Geopoints'];
            include "cerrar_conexion.php"; 
            return $ruta;
        }
    }

    
    function GetRutasDB() {
        include"conexion.php";
        $result = $mysqli->query("SELECT * FROM Routes") or die ($mysqli->error()); 
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
        
        $result = $mysqli->query("SELECT ID FROM Routes WHERE Name='$name'") or die ($mysqli->error);
        $res2 =  $result->fetch_assoc();
        $aux = $res2['ID'];
        
        include "cerrar_conexion.php"; 
        return $aux;
    }
    
    function GetRutaName_BD($idruta) {
        include"conexion.php";
        $aux;
        $result = $mysqli->query("SELECT Name FROM Routes WHERE ID='$idruta'") or die ($mysqli->error);
        $res2 =  $result->fetch_assoc();
        $aux = $res2['Name'];
        include "cerrar_conexion.php"; 
        return $aux;
    }

     function GetGeoPoints_BD($id) {
        include"conexion.php"; 
        $sql=" SELECT `Geopoints` FROM `Routes` WHERE `ID` =".$id;              
        $result = $mysqli->query($sql) or die ($mysqli->error); 
        $aux = $result->num_rows;        
        $res = array();    
        if ($aux > 0) {
                $i = 0;                
                while ($i < $aux) {                    
                    $res2 = $result->fetch_assoc();                    
                    $res[$i] = $res2["Geopoints"];
                    ++$i;
                }
        }        
       
        include ("cerrar_conexion.php");        
        return $res;
    }
    
    
     
?>
