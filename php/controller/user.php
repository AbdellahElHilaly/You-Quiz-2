<?php 
include_once '../class/user.php';

if(isset($_POST['chek-user-isexist'])){
    $username = $_POST['chek-user-isexist'];

    $user = new User($username);
    

    // $username = json_encode($user);
    $exist = $user->isExist('user_name');
    echo(json_encode($exist));

}

if(isset($_POST['save'])){

    $name = $_POST['name'];
    $result = $_POST['result'];
    $date = $_POST['date'];

    $user = new User($name , $result ,   $date);

    if($user->insert()) $response = "result saved succesfuly";
    else $response = "error : result hase not saved";

    echo json_encode($response);
    
}












?>