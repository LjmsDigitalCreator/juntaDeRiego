<?php

function queryUpdateClient($information){

    include('connection.php');

    $flag = 0;

    $idClient = $information['idClient'];
    $fName = $information['fName'];
    $sName = $information['sName'];
    $flName = $information['flName'];
    $slName = $information['slName'];
    $identity = $information['identity'];
    $email = $information['email'];
    $alterphone = $information['alterphone'];
    $phone = $information['phone'];
    $address = $information['address'];

    $password = md5($password);

    if($mysqli->query("UPDATE CLIENT
    SET
        NAME = '$fName',
        SECOND_NAME = '$sName',
        LAST_NAME = '$flName',
        SECOND_LAST_NAME = '$slName',
        IDENTITY = '$identity',
        EMAIL = '$email',
        PHONE = '$phone',
        ALTER_PHONE = '$alterphone',
        ADDRESS = '$address'
    WHERE ID_CLIENT = $idClient
    ")){
        $flag = 1;
    }else{
        echo("Connection failed: " . $mysqli->connect_errno);
    }
    
    $mysqli->close();

    return $flag;
}

?>