<?php

class User {
    public $nickname;
    public $deportes = array(); // array de deporte_asignado con su nivel --> (running, roller, cciclismo)
    public $zonas = array(); 
    //public $infoUser = array();
    public $mail;
    public $level;
//private $userDbHelper = new UserDbHelper();


    function __construct($nickname) {
        $this->nickname = $nickname;
        $this->GetUserInfo($nickname);            
    }
    
    function GetLogin($nickname, $password) {
        include ("UserDbHelper.php");
        $res = GetLoginDb($nickname, $password);
        if($res == 0) return 0;
        else return -1;
    }
    
    function CreateUser($nickname, $password, $mail, $level, $running, $ciclismo, $patinar) {
        include_once ("UserDbHelper.php");
        $result = CreateUserBD($nickname, $password, $mail, $level, $running, $ciclismo, $patinar);
        if ($result != -1) return 1;
        else return -1;
    }
    
    function GetUserInfo($nickname) {
        include_once ("UserDbHelper.php");
        $info = array();
        $info= GetUserInfoDB($nickname);
        $this->nickname = $info[0];
        $this->mail = $info[1];
        $this->level = $info[2];
        $j = 0;
        for($i = 3; $i < sizeof($info); ++$i) {
            $this->deportes[$j] = $info[$i];
            ++$j;
        }
        
    }

    function GetNickname() {
        return $this->nickname;
    }

    function GetDeportes() {
      return $this->deportes;
    }
}

  ?>
