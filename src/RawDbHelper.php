<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RawDbHelper
 *
 * @author Victor
 */
class RawDbHelper{
    function GetEventsUser($id_user){
        include"conexion.php";
        $result = $mysqli->query("SELECT Events.Name as ename, Routes.Name as rname, Events.Departure as efecha FROM Events, Routes, UserEvent, UserRoutes WHERE UserEvent.Eid=Events.ID AND UserEvent.Urid=UserRoutes.Urid AND UserEvent.Uid='$id_user' AND Routes.ID = UserRoutes.Rid") or die ($mysqli_error);
        $aux = $result->num_rows;
        $event = array();
        if($aux > 0) {
            for ($i=0; $i < $aux; ++$i) {    
                $res = $result->fetch_assoc();
                $event[$i][0] = $res["ename"];
                $event[$i][1] = $res["rname"];
                $event[$i][2] = $res["efecha"];
                
            }
        }
        else $event[0][0] = -2;
        include "cerrar_conexion.php";
        return $event;
     
      
    }
    
    function GetEventsInscritos($id_user) {
        include"conexion.php";
        $result = $mysqli->query("SELECT Events.Name as ename, Routes.Name as rname, Events.Departure as fecha FROM Events, Routes, UserEventInsc WHERE Events.ID=UserEventInsc.Eid AND UserEventInsc.Uid='$id_user' AND Routes.ID = Events.Route") or die ($mysqli_error);
        $aux = $result->num_rows;
        $event = array();
        if($aux > 0) {
            for ($i=0; $i < $aux; ++$i) {    
                $res = $result->fetch_assoc();
                $event[$i][0] = $res["ename"];
                $event[$i][1] = $res["rname"];
                $event[$i][2] = $res["fecha"];
            }
        }
        else $event[0][0] = -2;
        include "cerrar_conexion.php";
        return $event;
    }
    
    function GetEventsInscritosMovil($name_user) {
        include_once ("User.php");
        $aux_user = new User();
        $id_user = $aux_user->GetID_name($name_user);
        
        include"conexion.php";
        $result = $mysqli->query("SELECT Events.Name as ename, Events.Sport as esport, Events.Owner as eowner, Events.Description as edescription, Events.Departure as edeparture, Events.DistanceCheckpoint as edistcheck, Routes.Name as rname, Routes.Longitud as rlong,Routes.Sport as rsport,Routes.Dificultad as rdif,Routes.Time as rtime,Routes.Geopoints as rgeo FROM Events, Routes, UserEventInsc WHERE Events.ID=UserEventInsc.Eid AND UserEventInsc.Uid='$id_user' AND Routes.ID = Events.Route") or die ($mysqli_error);
        $aux = $result->num_rows;
        $event = array();
        if($aux > 0) {
            for ($i=0; $i < $aux; ++$i) {    
                $res = $result->fetch_assoc();
                //var_dump($res);
                $event[$i][0] = $res["ename"];
                $event[$i][1] = $res["esport"];
                $event[$i][2] = $res["eowner"];
                $event[$i][3] = $res["edescription"];
                $event[$i][4] = $res["edeparture"];
                $event[$i][5] = $res["edistcheck"];
                $event[$i][6] = $res["rname"];
                $event[$i][7] = $res["rlong"];
                $event[$i][8] = $res["rsport"];
                $event[$i][9] = $res["rdif"];
                $event[$i][10] = $res["rtime"];
                $event[$i][11] = $res["rgeo"];
                //for($j=0;$j<12; ++$j) echo $event[$i][$j];
            }
        }
        else $event[0][0] = -2;
        include "cerrar_conexion.php";
        return $event;
    }
    
    function GetRoutesUser($id_user){
        include"conexion.php";
        $result = $mysqli->query("SELECT Routes.Name as rname, UserRoutes.Date as urdate, UserRoutes.Time as urtime FROM Routes, UserRoutes WHERE UserRoutes.Uid='$id_user' AND UserRoutes.Rid=Routes.ID") or die ($mysqli_error);
        $aux = $result->num_rows;
        $event = array();
        if($aux > 0) {
            for ($i=0; $i < $aux; ++$i) {    
                $res = $result->fetch_assoc();
                $event[$i][0] = $res["rname"];
                $event[$i][1] = $res["urdate"];
                $event[$i][2] = $res["urtime"];
                
            }
        }
        else $event[0][0] = -2;
        include "cerrar_conexion.php";
        return $event;
     
      
    }
}

?>
