<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */ include ("Evento.php");
 
    //$string=  str_replace("quotesmorequotes", "+", $_GET['option']);
    $string= $_GET['option'];
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
    $aux_user_event = array();
    
    
        include_once ("RawDbHelper.php");
        $aux_raw = new RawDbHelper();
        $events = $aux_raw->GetEventsUser($id_user);
        if($events[0][0] == -2) echo "No estas inscrito en ningun evento";
        else {
            echo '<table cellspacing="4" cellpadding="4">
           <tr align="center">
            <td align="center">Nombre Evento</td>
            <td align="center">Nombre Ruta</td>
            <td align="center">Fecha</td>
           </tr>';
            for ($i=0; $i<sizeof($events); ++$i) {
                echo '<tr>
                <td align="center">',$events[$i][0],'</td>
                <td align="center">',$events[$i][1],'</td>
                <td align="center">',$events[$i][2],'</td>
              </tr>';
                
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
        
?>
