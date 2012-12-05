<?php

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
    
    include_once 'User.php';
    $user = new User();
    $user->GetUserInfo($nick_user);
    
    echo '
            <html>
            <head></head>
            <body>
            <h3>Usuario:  Perfil Usuario  </h3>
            <p> Usuario:  ', $user->nickname,'<br>
            </p>
            <p> Mail:  ', $user->mail,'<br>
            </p>
            </body>
            </html> ';
    
    //$string="propietario**1$\$id**".$user->GetID();
    
    $string = urlencode($string);
    
    //$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))))), MCRYPT_MODE_CBC, md5(md5($key))), "\0")."<br/>";
    echo 'Deportes:  <a href="add_sport.php?option='.$string.'">Add sport</a><br>';
    
            $aux = $user->GetDeportes();
            
            for ($i=0; $i < sizeof($aux); ++$i) {
                $string2="propietario**1$\$id**".$user->GetID()."$\$idsport**".$aux[$i][0]."$\$level**".$aux[$i][1];
                //echo $string2.'<br>';
                if($aux[$i][0] == 1) echo 'Running ';
                else if ($aux[$i][0] == 2) echo 'Ciclimo ';
                else if ($aux[$i][0] == 3) echo 'Patinaje ';
                echo ',  ';
                if($aux[$i][1] == 1) {
                    echo ' Nivel: Principiante    ';
                    echo '<a href="editar_level.php?option='.urlencode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string2, MCRYPT_MODE_CBC, md5(md5($key))))).'">Edit Nivel</a><br>';
                }
                else if($aux[$i][1] == 2) {
                    echo ' Nivel: Medio    ';
                    echo '<a href="editar_level.php?option='.urlencode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string2, MCRYPT_MODE_CBC, md5(md5($key))))).'">Edit Nivel</a><br>';
                }
                else if($aux[$i][1] == 3) {
                    echo ' Nivel: Profesional    ';
                    echo '<a href="editar_level.php?option='.urlencode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string2, MCRYPT_MODE_CBC, md5(md5($key))))).'">Edit Nivel</a><br>';
                }
                
                
            }
            
?>
