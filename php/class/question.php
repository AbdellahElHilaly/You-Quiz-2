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

    public function get(){
        $datas = $this->select();
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

// $repons = array("Amazon EC2 costs are billed on a monthly basis",
//     "Users retain full administrative access to their Amazon EC2 instances", 
//     "Amazon EC2 instances can be launched on demand when needed", 
//     "Users can permanently run enough instances to handle peak workloads"
// );
// $question = new Question("Why is AWS more economical than traditional data centers for applications with varying compute workloads?", $repons, 2, "The ability to launch instances on demand when needed allows users to launch and terminate instances in
// response to a varying workload. This is a more economical practice than purchasing enough on-premises servers
// to handle the peak load", 1);
// $question->insert();


// echo "<pre>";
// print_r($question);
// echo "</pre>";


// $question->insert();

// $question->update('WHERE id = ' . ($question->id));

// $id = $question->id;

// $question->print($question->id);

// $question = new Question()      ;
// $data = $question->select()     ;
// $question->getObject($data[0])     ;
// $data = $question->delete()     ;


// echo "<pre>";
// print_r($question->get());
// echo "</pre>";


// print_r($question->getData());

// $question->insert();









?>