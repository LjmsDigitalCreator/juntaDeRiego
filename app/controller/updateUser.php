<?php

include('../model/updateUserModel.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(
        isset($_POST['user']) && isset($_POST['password']) && isset($_POST['rol'])
    ){

        $information = array(
            "idUser" => $_POST['idUser'],
            "user" => $_POST['user'],
            "password" => $_POST['password'],
            "rol" => $_POST['rol']
        );

        $result = queryUpdateUser($information);
        $result ? header('Location: ../view/user.php') : header('Location: ../view/user.php?failed=1');
        
    }
}

?>