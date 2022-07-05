<?php

session_start();

include('../model/loginModel.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['user']) && isset($_POST['password'])){

        $user = $_POST['user'];
        $password = $_POST['password'];

        $password = md5($password);

        $result = queryLogin($user, $password);

        $result ? header('Location: ../view/information.php') : header('Location: ../../index.php?failed=1');
    }
}

?>