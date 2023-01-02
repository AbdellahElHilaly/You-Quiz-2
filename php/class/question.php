<?php

include_once '../class/database.php';
class Question extends MySQLDatabase{
    public $question;
    public $repons;
    public $corectRepons;  
    public $R_C_Indis;
    public $deficulty;
    
    
    public function __construct($question=NULL, $repons=NULL, $reponsIndex=NULL, $corectRepons=NULL, $deficulty=NULL) {
        parent::__construct();
        $this->table = 'questions';
        $this->question = $question;
        $this->repons = serialize($repons);
        $this->R_C_Indis = $reponsIndex;
        $this->corectRepons = $corectRepons;
        $this->deficulty = $deficulty;

        $this->data = [
            'question'      =>  $this->question       ,
            'repons'        =>  $this->repons         ,
            'corectRepons'  =>  $this->corectRepons   ,
            'R_C_Indis'     =>  $this->R_C_Indis      ,
            'deficulty'     =>  $this->deficulty
        ];
    }


    
    public function getQuestion() {
        return $this->question;
    }

    public function setQuestion($question) {
        $this->question = $question;
    }

    public function getRepons() {
        return $this->repons;
    }

    public function setRepons($repons) {
        $this->repons = $repons;
    }

    public function getCorectRepons() {
        return $this->corectRepons;
    }

    public function setCorectRepons($corectRepons) {
        $this->corectRepons = $corectRepons;
    }

    public function getRCIndis() {
        return $this->R_C_Indis;
    }

    public function setRCIndis($R_C_Indis) {
        $this->R_C_Indis = $R_C_Indis;
    }

    public function getDifficulty() {
        return $this->deficulty;
    }

    public function setDifficulty($deficulty) {
        $this->deficulty = $deficulty;
    }

    public function getObject($dbobject){
        $this->id = $dbobject->id;
        $this->question = $dbobject->question;
        $this->repons = unserialize($dbobject->repons);
        $this->corectRepons = $dbobject->corectRepons;
        $this->R_C_Indis = $dbobject->R_C_Indis;
        $this->deficulty = $dbobject->deficulty;
        $this->data = [
            'question'      =>  $this->question             ,
            'repons'        =>  serialize($this->repons)    ,
            'corectRepons'  =>  $this->corectRepons         ,
            'R_C_Indis'     =>  $this->R_C_Indis            ,
            'deficulty'     =>  $this->deficulty
        ];
    }

    public function getQuizData($index){
        if($index){
            $data = array(
                "id" => $this->id,
                "question" => $this->question,
                "repons" =>  $this->repons,
                "R_C_Indis" =>  $this->R_C_Indis,
                "corectRepons" =>  $this->corectRepons,
                "difficulty" =>  $this->deficulty,
            );
            return $data;
        }
        else {
            $data = array(
                "id" => $this->id,
                "question" => $this->question,
                "repons" =>  $this->repons,
                "difficulty" =>  $this->deficulty,
            );
            return $data;
        }
        
    }

    public function get($where = NULL){
        $datas = $this->select($where);
        $questions  = array();
        $i = 0;
        foreach($datas as $data){
            $questions[$i] = new Question();
            $questions[$i]->getObject($data);
            $i++;
            
        }
        return $questions;
    }
}





?>