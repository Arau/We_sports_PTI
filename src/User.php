<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Victor
 */
    class User {
        public $nickname;
        public $deportes = array(); // array de deporte_asignado con su nivel --> (running, roller, cciclismo)
        public $mail;
	private $id;
		
	        
        /*function __construct($nickname) {
            $this->nickname = $nickname;
            //$this->GetUserInfo($nickname);
            
	}*/
        
        function __construct() {
                     
	}
        
        function GetLogin($nickname, $password) {
            include ("UserDbHelper.php");
            $res = GetLoginDb($nickname, $password);
            if($res == 0) return 0;
            else return -1;
        }
        
        function CreateUser($nickname, $password, $mail, $running, $ciclismo, $patinar) {
            include_once ("UserDbHelper.php");
            $result = CreateUserBD($nickname, $password, $mail, $running, $ciclismo, $patinar);
            if ($result != -1) return 1;
            else return -1;
	}
        
        function GetUserInfo($nickname) {
            include_once ("UserDbHelper.php");
            $info = array();
            $info= GetUserInfoDB($nickname);
            $this->nickname = $info[0];
            $this->mail = $info[1];
            $this->id = $info[2];
            $j=0;
            $i=3;
            while ($i < sizeof($info)) {
                $this->deportes[$j][0] = $info[$i];
                $this->deportes[$j][1] = $info[$i+1];
                ++$j;
                $i = $i+2;
            }
			return $info;
            
        }
	
        function UpdateSport($id, $sport, $level) {
            include_once ("UserDbHelper.php");
            $res = UpdateSportBD($id, $sport, $level);
            if ($res == 0) return $res;
            else return -1;
        }
        
        function UpdateLevelSport($id, $sport, $level) {
            include_once ("UserDbHelper.php");
            $res = UpdateLevelSportBD($id, $sport, $level);
            if ($res == 0) return $res;
            else return -1;
        }
        
	function GetNickname() {
            return $this->nickname;
	}
		
	function GetDeportes() {
		return $this->deportes;
	}
        
        function GetID() {
		return $this->id;
	}
        
        function GetID_name($nickname) {
            include_once ("UserDbHelper.php");
            $res = GetId_name_BD($nickname);
            return $res;
	}
        
        function GetName_Id($id_user) {
            include_once ("UserDbHelper.php");
            $res = GetName_Id_BD($id_user);
            return $res;
	}
    }
		
?>
