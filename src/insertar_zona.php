<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    $name = $_POST["name"];
        
    include("Zona.php");
    $zona = new Zona();
    $res = $zona->CreateZona($name);
    echo ' <html>
            <head></head>
            <body>
            <h3>La zona ha sido guardada</h3>
            <a href="javascript:history.back(1)"><b>Home</b></a>
            </body>
            </html> ';
?>
