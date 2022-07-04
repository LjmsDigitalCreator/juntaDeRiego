<?php

function queryCreateClient($information){

    include('connection.php');

    $flag = 0;

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

    if($mysqli->query("INSERT INTO CLIENT(
        NAME,
        SECOND_NAME,
        LAST_NAME,
        SECOND_LAST_NAME,
        IDENTITY,
        EMAIL,
        PHONE,
        ALTER_PHONE,
        ADDRESS
    ) VALUES(
        '$fName',
        '$sName',
        '$flName',
        '$slName',
        '$identity',
        '$email',
        '$phone',
        '$alterphone',
        '$address'
    )")){
        $flag = 1;
    }else{
        echo("Connection failed: " . $mysqli->connect_errno);
    }
    
    $mysqli->close();

    return $flag;
}

?>