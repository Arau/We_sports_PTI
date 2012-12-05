<?php
    if(isset($_GET['option'])){
        $string=  $_GET['option'];
        echo $string;
        
        $key="proyectopti";
            $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "\0"); ;
            echo $decrypted."<br/>";
            
            $options=explode("$$", $decrypted); // es vector de 2 posiciones, en cada posicion tiene otro vector de 2 posiciones(p)
            foreach($options as &$val){
                echo$val."<br/>";
                $val=explode("**", $val);
                var_dump($val);
                echo "<br/>";
            }
            var_dump($options);
            $nick = $options[1][1];
            $id_user =$options[2][1];
            echo $nick;
            echo $id_user;
            
            echo '
            <html>
                <head>
                    <title>Add Sport</title>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                </head>
                <body>
                    <h3>Add new Sport</h3>
                    <form name="form1" method="post" 
                        action="add_sport.php?">
                    <input type="hidden" name="id" value="'.$id_user.'">
                    
                    <p>Sport:<br>
                          <SELECT name="form_sport">
                            <option selected>--- Elige tu nuevo Sport ---
                            <option value = 1>Running</option>
                            <option value = 2>Ciclismo</option>
                            <option value=3 >Roller</option>
                          </SELECT>
                     </p>
                     <p>Nivel:<br>
                          <SELECT name="form_level">
                            <option selected>--- Elige tu nuevo Sport ---
                            <option value = 1>Principiante</option>
                            <option value = 2>Medio</option>
                            <option value=3 >Pro</option>
                          </SELECT>
                     </p>
                      <p>
                        <input type="submit" name="Submit" value="Enviar">
                      </p>
                  </form>
            </body>
        </html>';
    }
    else if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sport = $_POST['form_sport'];
        $level = $_POST['form_level'];
        include 'User.php';
        $usuario = new User();
        $res = $usuario->UpdateSport($id, $sport, $level);
        if ($res == 0) echo 'Deporte anadido correctamente!';
    }
    
?>
