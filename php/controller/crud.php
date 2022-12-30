<?php
include_once '../class/question.php';




if(isset($_POST['request']) && $_POST['request'] == 'insert'){
    $data = $_POST['data_send'];
    echo json_encode($data);

    $question = new Question();
    // $data = $question->select();
    // $question->getObject($data[0]);
    // if($question->delete()) echo("ok"); 
    // else echo("no");

    



    // echo "<pre>";
    // print_r(json_encode($question->get()));
    // echo "</pre>";

}










?>