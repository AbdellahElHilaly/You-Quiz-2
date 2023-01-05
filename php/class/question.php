<?php

include_once '../class/database.php';
class Question extends MySQLDatabase{
    private $question;
    private $repons;
    private $corectRepons;  
    private $R_C_Indis;
    private $deficulty;
    
    
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