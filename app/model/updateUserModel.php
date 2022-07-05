<?php

function queryUpdateUser($information){

    include('connection.php');

    $flag = 0;

    $idUser = $information['idUser'];
    $user = $information['user'];
    $password = $information['password'];
    $rol = $information['rol'];

    $password = md5($password);

    if($mysqli->query("UPDATE USER
    SET
        USER = '$user',
        PASSWORD = '$password',
        ROL = '$rol'
    WHERE ID_USER = $idUser
    ")){
        $flag = 1;
    }else{
        echo("Connection failed: " . $mysqli->connect_errno);
    }
    
    $mysqli->close();

    return $flag;
}

?>