<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */include ("Ruta.php");
 
    //$string=  str_replace("quotesmorequotes", "+", $_GET['option']);
    $string=  $_GET['option'];
    $key="proyectopti";
    echo $string;
    
    
    $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "\0"); ;
    echo "-->",$decrypted;
    $options=explode("$$", $decrypted); // es vector de 2 posiciones, en cada posicion tiene otro vector de 2 posiciones(p)
    foreach($options as &$val){
        echo$val."<br/>";
        $val=explode("**", $val);
        var_dump($val);
        echo "<br/>";
    }
    var_dump($options);
    $nick_user = $options[1][1];
    $id_user = $options[2][1];
    $aux = array();
    
    
    include_once ("RawDbHelper.php");
        $aux_raw = new RawDbHelper();
        $routes = $aux_raw->GetRoutesUser($id_user);
        if($routes[0][0] == -2) echo "No has realizado ninguna ruta";
        else {
            echo '<table cellspacing="4" cellpadding="4">
           <tr align="center">
            <td align="center">Nombre Ruta</td>
            <td align="center">Date</td>
            <td align="center">Time</td>
           </tr>';
            for ($i=0; $i<sizeof($routes); ++$i) {
                echo '<tr>
                <td align="center">',$routes[$i][0],'</td>
                <td align="center">',$routes[$i][1],'</td>
                <td align="center">',$routes[$i][2],'</td>
              </tr>';
                //echo "Ruta: ", $routes[$i][0], ",   Fecha: ", $routes[$i][1], ",  Tiempo final: ", $routes[$i][2], "<br>";
            }
            echo '</table>';
        
        echo ' <html>
            <head></head>
            <body>
            <br><br>
            <a href="javascript:history.back(1)"><b>Home</b></a>
            </body>
            </html> ';
        }
    
    
    /*include_once ("UserRoute.php");
    $user_route = new UserRoute();
    $aux = $user_route->GetRutasUser($id_user);
    echo '<table cellspacing="4" cellpadding="4">
           <tr align="center">
            <td align="center">Nombre Ruta</td>
            <td align="center">Date</td>
            <td align="center">Time</td>
           </tr>';
    for ($i=0; $i < sizeof($aux); ++$i) { 
        echo '<tr>
                <td align="center">',$aux[$i][0],'</td>
                <td align="center">',$aux[$i][1],'</td>
                <td align="center">',$aux[$i][2],'</td>
              </tr>';
    }
    echo '</table>';
    echo ' <html>
            <head></head>
            <body>
            <br><br>
            <a href="javascript:history.back(1)"><b>Home</b></a>
            </body>
            </html> ';*/
?>
