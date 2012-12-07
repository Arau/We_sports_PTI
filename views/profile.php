<?php
	session_start();
	require_once("../functions/htmlfunctions.php");
	$name = $_SESSION['user'];
	echo "user-->", $name;
	
	
	include_once("../src/User.php");
	$user = new User();
	$info = $user->GetUserInfo($name);
	echo '<p>Usuario: ', $user->nickname,' <p>
            
            <p> Mail:  ', $user->mail,'<br>
            </p> ';
	
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
			
			// funcion para editar nivel
			$id_user = $_POST['id_user'];
        $sport = $_POST['id_sport']; 
        $level = $_POST['form_level'];
        include_once ("../src/User.php");
        $usuario = new User();
        $res = $usuario->UpdateLevelSport($id_user, $sport, $level);
        if ($res == 0) echo 'Nivel actualizado correctamente!';
		
		// funcion para anadir un deporte al usuario
		else if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sport = $_POST['form_sport'];
        $level = $_POST['form_level'];
         include_once ("../src/User.php");
        $usuario = new User();
        $res = $usuario->UpdateSport($id, $sport, $level);
        if ($res == 0) echo 'Deporte anadido correctamente!';
		else if ($res == -2) echo 'Ya tienes asignado este deporte!';
		else echo "Error al asignar deporte";
    }
?>

<div id="userImage"> </div> 
