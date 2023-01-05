<?php 
include_once '../class/database.php';

class User extends MySQLDatabase{
    private $user_name;
    private $highest_score;
    private $ip_adress;
    private $browser;
    private $date_time;

    function __construct($name ="" , $h_scor  ="", $dt ="")
    {
        parent::__construct();
        $this->table = "users";
        $this->user_name = $name;
        $this->ip_adress = $_SERVER['REMOTE_ADDR'];
        $this->browser = $_SERVER['HTTP_USER_AGENT'];
        $this->highest_score = $h_scor;
        $this->date_time = $dt;

        $this->data = [
            'user_name'      =>  $this->user_name  ,
            'highest_score'        =>  $this->highest_score ,
            'ip_adress'  =>  $this->ip_adress   ,
            'browser'     =>  $this->browser      ,
            'date_time'     =>  $this->date_time
        ];
    }
}





?>