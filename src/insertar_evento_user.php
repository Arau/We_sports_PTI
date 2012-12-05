<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $username = $_POST["username"];
    $eventname = $_POST["eventname"];
    $checkpoints = $_POST["checkpoints"];
    $time = $_POST["time"];
    
    
    include_once ("UserEvent.php");
    $user_event = new UserEvent();
    $res = $user_event->SetEventUser($username, $eventname, $checkpoints, $time);
    echo ' <html>
            <head></head>
            <body>
            <h3>La ruta ha sido guardada</h3>
            <a href="javascript:history.back(1)"><b>Home</b></a>
            </body>
            </html> ';
?>
