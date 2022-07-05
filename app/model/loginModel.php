<?php

session_start();

function queryLogin($user, $pwd){
    
    include('connection.php');
    
    $flag = 0;

    $query = $mysqli->query("SELECT ID_USER, USER, PASSWORD, ROL FROM USER WHERE USER = '$user'");
    $result = $query->fetch_object();

    if($user == $result->USER && $pwd == $result->PASSWORD){
        $_SESSION['user'] = $result->USER;
        $_SESSION['rol'] = $result->ROL;
        $_SESSION['id'] = $result->ID_USER;
        $flag = 1;
    }
    
    $mysqli->close();

    return $flag;
}

?>