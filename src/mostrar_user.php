<?php
$string=$_GET['option'];
$key="proyectopti";

    $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($_GET['option']), MCRYPT_MODE_CBC, md5(md5($key))), "\0"); ;
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
    
    $string="propietario**1$\$id**".$user->GetID();
        
    $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))))), MCRYPT_MODE_CBC, md5(md5($key))), "\0")."<br/>";
    echo 'Deportes:  <a href="add_sport.php?option='.str_replace('+','quotesmorequotes',base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))))).'">Add sport</a><br>';
            $aux = $user->GetDeportes();
            for ($i=0; $i < sizeof($aux); ++$i) {
                echo '<br>';
                if($aux[$i][0] == 1) echo 'Running';
                else if ($aux[$i][0] == 2) echo 'Ciclimo ';
                else if ($aux[$i][0] == 3) echo 'Patinaje ';
                echo ',  ';
                if($aux[$i][1] == 1) echo ' Nivel: Principiante';
                else if($aux[$i][1] == 2) echo ' Nivel: Medio';
                else if($aux[$i][1] == 3) ' Nivel: Profesional';
                
                echo '<a href="actualizar_level.php">Edit</a></td>';
            }
            
?>
