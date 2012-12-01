<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    include ("Zona.php");
    $aux = array();
    $zona = new Zona();
    $aux = $zona->GetZonas();
    for ($i=0; $i < sizeof($aux); ++$i) {
        echo '<div>', $aux[$i]; '</div><br>';
    }
    echo ' <html>
            <head></head>
            <body>
            <br><br>
            <a href="javascript:history.back(1)"><b>Home</b></a>
            </body>
            </html> ';
    
?>
