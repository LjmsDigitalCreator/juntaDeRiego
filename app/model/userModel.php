<?php

function queryCreateUser($information){

    include('connection.php');

    $flag = 0;

    $user = $information['user'];
    $password = $information['password'];
    $rol = $information['rol'];

    $password = md5($password);

    if($mysqli->query("INSERT INTO USER(
        USER,
        PASSWORD,
        ROL
    ) VALUES(
        '$user',
        '$password',
        '$rol'
    )")){
        $flag = 1;
    }else{
        echo("Connection failed: " . $mysqli->connect_errno);
    }
    
    $mysqli->close();

    return $flag;
}

?>