<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    include ("Ruta.php");
    $ruta = new Ruta();
    $aux = array();
    $aux = $ruta->GetRutas();
    
   echo '
        <h3>Registrar Evento</h3>
        <form name="form3" method="post" 
            action="insertar_evento2.php?">
          <p>Nombre del evento:<br>
            <input type="text" name="name">
          </p>
          <p>Ruta<br>';
              echo '
                <SELECT name="form_ruta">
                <option selected>--- Selecciona una ruta ---';
                for($i=0; $i<sizeof($aux); ++$i) {
                    echo '<option>', $aux[$i], '</option>';
                }
                echo'
                </SELECT>
            
          </p>
          
          <p>Sport(1/2/3):<br>
            <input type="text" name="sport">
          </p>
          <p>Descripcion del evento:<br>
            <input type="text" name="descripcion">
          </p>
          
          <p>Fecha y hora (year-month-day h:m:s)<br>
            <input type="text" name="departure">
          </p>
          
          <p>Distancia entre checkpoints(metros):<br>
            <input type="text" name="distcheckpoints">
          </p>
          
          <p>
            <input type="submit" name="Submit" value="Enviar">
          </p>
        </form>
    </body>'

    
?>
