<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
   

    function CreateUserBD($nickname, $password, $mail, $level, $running, $ciclismo, $patinar) {
      //echo "entro en dbhelper";
      $deportes = array($running, $ciclismo , $patinar);
                   
      include"conexion.php";
      $sql = "INSERT INTO Users (ID, Uname, Password, Mail, Level) VALUES ('NULL', '$nickname', '$password', '$mail', $level)";
      mysql_query($sql) or die(mysql_error());
      $result2 = mysql_query("SELECT ID FROM users WHERE Uname = '$nickname'") or die(mysql_error()); //extraemos el ID del usuario
      /*while ($row = mysql_fetch_row($result2)) {
        echo $row[0];
      }*/
      $aux = mysql_fetch_row($result2);
      
      for ($i=0; $i < sizeof($deportes); ++$i) { // buscamos el ID de usuario en la tabla de usersport
          if ($deportes[$i] == "on") {
            $sql2 = "INSERT INTO usersport (Uid, Sid) VALUES ($aux[0], ($i+1))";
            mysql_query($sql2) or die(mysql_error());  
        }
      }
     
      include "cerrar_conexion.php"; 
      return 0;
     }
    
    
     
     function GetLoginDb($nickname, $password) {
        
        include"conexion.php";
        $sql = "SELECT COUNT(*) FROM users WHERE Uname = '$nickname' AND Password = '$password'";
        $result = mysql_query($sql) or die(mysql_error());
        //$num_filas= mysql_num_rows($result); 
        try{
            if(mysql_result($result,0)) {
            $comprobar = mysql_result($result, 0);
            //echo $result;
                //echo "Usuario validado correctamente";
                /*$aux2 = mysql_fetch_row($result);
                echo $aux2[0]," , ";
                echo $aux2[1]," , ";
                echo $aux2[3], " , ";
                echo $aux2[4], " . ";*/
                include "cerrar_conexion.php";
                return 0;
                      
            }else {
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
        $result = mysql_query("SELECT * FROM users WHERE Uname = '$nickname'") or die (mysql_error()); 
        $aux = mysql_num_rows($result);
        if ($aux == 1){
            $res = mysql_fetch_assoc($result);
            $user[0] =$nickname;
            $user[1] = $res['Mail'];
            $user[2] = $res['Level'];
            $ID_user = $res['ID'];
            $result2 = mysql_query("SELECT * FROM usersport WHERE Uid = $ID_user") or die (mysql_error()); 
            $aux = mysql_num_rows($result2);
            if ($aux > 0) {
                $i = 3;
                while ($res2 =mysql_fetch_assoc($result2)) {
                    $user[$i] = $res2['Sid'];
                    ++$i;
                    /*echo $res2['Uid'], " ->";
                    echo $res2['Sid'], " , ";*/
                }
            }
            return $user;
        }
    }
    
?>
