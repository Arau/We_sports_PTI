<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_GET['option'])){
    $string=  $_GET['option'];
    $key="proyectopti";
    $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "\0"); ;
    echo "decripted---->>>>>>>>".$decrypted."<br/>";
    $options=explode("$$", $decrypted); // es vector de 2 posiciones, en cada posicion tiene otro vector de 2 posiciones(p)
    foreach($options as &$val){
        //echo$val."<br/>";
        $val=explode("**", $val);
        var_dump($val);
        //echo "<br/>";
    }
    var_dump($options);
    $id_user = $options[1][1];
    $id_sport = $options[2][1];
    echo $options[1][1];
    echo $options[2][1];
    echo $options[3][1];
    
    echo '
            <html>
                <head>
                    <title>Actualizar Nivel</title>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                </head>
                <body>
                    <h3>Actualizalizar nivel: </h3>
                    <form name="form1" method="post" 
                        action="editar_level.php?">
                    <input type="hidden" name="id_user" value="'.$id_user.'">
                    <input type="hidden" name="id_sport" value="'.$id_sport.'">
                    
                    <p>Nivel:<br>
                          <SELECT name="form_level">
                            <option selected>--- Elige tu nivel ---
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
    
    else if(isset($_POST['id_user'])){
        $id_user = $_POST['id_user'];
        $sport = $_POST['id_sport'];
        $level = $_POST['form_level'];
        include 'User.php';
        $usuario = new User();
        $res = $usuario->UpdateLevelSport($id_user, $sport, $level);
        if ($res == 0) echo 'Nivel actualizado correctamente!';
    }
    
?>
