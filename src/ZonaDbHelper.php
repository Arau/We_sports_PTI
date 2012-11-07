<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    function CreateZonaBD($name) {
      include"conexion.php";
      $sql = "INSERT INTO zones (ID, Name) VALUES ('NULL', '$name')";
      mysql_query($sql) or die(mysql_error());
               
      include "cerrar_conexion.php"; 
      return 0;
    }
    
    
    function GetZonasDB() {
        include"conexion.php";
        $result = mysql_query("SELECT * FROM zones") or die (mysql_error()); 
        $aux = mysql_num_rows($result);
        $zonas = array();    
        if ($aux > 0) {
                $i = 0;
                while ($res2 =mysql_fetch_assoc($result)) {
                    $zonas[$i] = $res2['Name'];
                    ++$i;
                }
            }
            include ("cerrar_conexion.php");
            return $zonas;
    } 
?>
