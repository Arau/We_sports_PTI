<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $id_user = $_POST["id_user"];
    $id_ruta = $_POST["id_ruta"];
    $fecha = $_POST["fecha"];
    $time = $_POST["time"];
         
    include("UserRoute.php");
    $userroute = new UserRoute();
    $res = $userroute->CreateRutaUser($id_user, $id_ruta, $fecha, $time);
    echo ' <html>
            <head></head>
            <body>
            <h3>La ruta ha sido guardada</h3>
            <a href="javascript:history.back(1)"><b>Home</b></a>
            </body>
            </html> ';
?>
