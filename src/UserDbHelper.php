<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
   

    function CreateUserBD($nickname, $password, $mail, $running, $ciclismo, $patinar) {
      //echo "entro en dbhelper";
      $deportes = array($running, $ciclismo , $patinar);
                   
      include"conexion.php";
      $sqli = "INSERT INTO Users (ID, Uname, Password, Mail) VALUES ('NULL', '$nickname', '$password', '$mail')";
      $mysqli->query($sqli) or die($mysqli->error);
      
      $aux = $mysqli->insert_id;
                
      for ($i=0; $i < sizeof($deportes); ++$i) { // buscamos el ID de usuario en la tabla de usersport
          if ($deportes[$i][0] == "on") {
            if($deportes[$i][1] == 1) $level = 1;
            else if ($deportes[$i][1] == 2) $level = 2;
            else $level = 3;
          
            $sqli2 = "INSERT INTO UserSport (Uid, Sid, Level) VALUES ($aux, ($i+1), $level)";
            $mysqli->query($sqli2) or die($mysqli->error);  
        }
      }
     
      include "cerrar_conexion.php"; 
      return 0;
     }
    
    function GetLoginDb($nickname, $password) {
        
        include"conexion.php";
        $sqli = "SELECT COUNT(*) as total FROM Users WHERE Uname = '$nickname' AND Password = '$password'";        
        $result = $mysqli->query($sqli) or die($mysqli_error);        
        $fetch = $result->fetch_assoc();
        $logged = intval($fetch["total"]); 
        
        try{   

            if($logged == 1) {
                include "cerrar_conexion.php";
                return 0;
            }
            else {
                include "cerrar_conexion.php";
                return -1;
            }
        }catch(Exception $error){}
    }
     
     
    function GetUserInfoDB($nickname) {
        
        include_once "User.php";
        $user = array(); //new User($nickname);
        //$nickname = $_POST["nombre"];
        include"conexion.php";
        $result = $mysqli->query("SELECT * FROM Users WHERE Uname = '$nickname'") or die (mysqli_error); 
        $aux = $result->num_rows;
        if ($aux == 1){
            $res = $result->fetch_assoc();
            $user[0] =$nickname;
            $user[1] = $res['Mail'];
            $user[2] = $res['ID'];
            $ID_user = $res['ID'];
            $result2 = $mysqli->query("SELECT * FROM UserSport WHERE Uid = $ID_user") or die (mysqli_error()); 
            $aux = $result2->num_rows;
            if ($aux > 0) {
                $i = 3;
                while ($res2 = $result2->fetch_assoc()) {
                    $user[$i] = $res2['Sid'];
                    $user[$i+1] = $res2['Level'];
                    $i = $i +2;
                }
            }
            include "cerrar_conexion.php"; 
			
            return $user;
        }
    }
    
    function UpdateSportBD($id, $sport, $level) { // anyade deporte a un usuario existente
        include"conexion.php";
        $sqli = "SELECT COUNT(*) as total FROM UserSport WHERE Uid = '$id' AND Sid = '$sport'";        
        $result = $mysqli->query($sqli) or die($mysqli_error);        
        $fetch = $result->fetch_assoc();
        
        $existe = intval($fetch["total"]); 
        include 'cerrar_conexion.php';
        try{   

            if($existe == 1) return -2;
            else {      
                include 'conexion.php';
                $sqli = "INSERT INTO UserSport (Uid, Sid, Level) VALUES ($id, $sport, $level)";
                $mysqli->query($sqli) or die($mysqli->error); 
        
                include 'cerrar_conexion.php';
            }
        }
        catch(Exception $error){}
        return 0;
    }
    
    
    function UpdateLevelSportBD($id, $sport, $level) { 
        include 'conexion.php';
        $sqli = "UPDATE UserSport SET Level = $level WHERE Uid = $id AND Sid = $sport";
        $result = $mysqli->query($sqli) or die($mysqli_error);
        include 'cerrar_conexion.php';
        
    }
    
    function GetId_name_BD($nickname) {
        include"conexion.php";
        $result = $mysqli->query("SELECT ID FROM Users WHERE Uname = '$nickname'") or die (mysqli_error); 
        $aux = $result->num_rows;
        if ($aux == 1){
            $res = $result->fetch_assoc();
            $ID_user = $res['ID'];
            include "cerrar_conexion.php"; 
            return $ID_user;
        }
        include "cerrar_conexion.php"; 
        return -1;
    }
    
    function GetName_Id_BD($id_user) {
        echo "------------->>>>>>>", $id_user;
        include"conexion.php";
        $result = $mysqli->query("SELECT * FROM Users WHERE ID = '$id_user'") or die (mysqli_error); 
        $aux = $result->num_rows;
        echo "auxxxxxxxxxxxxxxxxxx---->>>->>>>", $aux;
        if ($aux > 0){
            $res = $result->fetch_assoc();
            $name_user = $res['UName'];
            include "cerrar_conexion.php"; 
            return $name_user;
        }
        include "cerrar_conexion.php"; 
        return -1;
    }
    
?>
