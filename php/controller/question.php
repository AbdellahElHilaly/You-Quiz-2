<?php
include_once '../class/question.php';


    if(isset($_POST['get-question'])){
        $question = new Question();
        $data = array();
        $question = $question->get();
        for ($i = 0; $i < count($question); $i++) {
            array_push($data , $question[$i]->getQuizData(false));
        }
        print_r(json_encode($data));
    }

    if(isset($_POST['get-respons'])){
        $id  = $_POST['id'];
        
        $question = new Question();
        
        $question = $question->get('WHERE id = ' . $id);

        for ($i = 0; $i < count($question); $i++) {
            $data = $question[$i]->getQuizData(true);
        }
        print_r(json_encode($data));
    }



    function add(){
        $questions = $_POST["questions"];

        for ($i = 0; $i < count($questions); $i++) {
            $questions[$i] = new Question(
                $questions[$i]->question,
                $questions[$i]->repons,
                $questions[$i]->R_C_Indis,
                $questions[$i]->corectRepons,
                $questions[$i]->difficulty,
            );
            $questions[$i]->insert();
        }

    }


    

    

?>