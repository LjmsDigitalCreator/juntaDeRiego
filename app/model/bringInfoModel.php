<?php

function queryBringClientInformation(){

    include('connection.php');

    $query = $mysqli->query("SELECT
        ID_CLIENT,
        NAME,
        LAST_NAME,
        IDENTITY,
        ADDRESS
    FROM CLIENT");

    $data = array();

    while ($info = $query->fetch_object()) {
        array_push($data, [
            'ID_CLIENT'=>$info->ID_CLIENT,
            'NAME'=>$info->NAME,
            'LAST_NAME'=>$info->LAST_NAME,
            'IDENTITY'=>$info->IDENTITY,
            'ADDRESS'=>$info->ADDRESS
        ]);
    }

    $mysqli->close();

    return $data;
}

function queryBringClientInformationById($identify){

    include('connection.php');

    $query = $mysqli->query("SELECT
        ID_CLIENT,
        IDENTITY,
        NAME,
        SECOND_NAME,
        LAST_NAME,
        SECOND_LAST_NAME,
        EMAIL,
        PHONE,
        ALTER_PHONE,
        ADDRESS
    FROM CLIENT
    WHERE ID_CLIENT = $identify");

    $data = array();

    while ($info = $query->fetch_object()) {
        array_push($data, [
            'ID_CLIENT'=>$info->ID_CLIENT,
            'IDENTITY'=>$info->IDENTITY,
            'NAME'=>$info->NAME,
            'SECOND_NAME'=>$info->SECOND_NAME,
            'LAST_NAME'=>$info->LAST_NAME,
            'SECOND_LAST_NAME'=>$info->SECOND_LAST_NAME,
            'EMAIL'=>$info->EMAIL,
            'PHONE'=>$info->PHONE,
            'ALTER_PHONE'=>$info->ALTER_PHONE,
            'ADDRESS'=>$info->ADDRESS
        ]);
    }

    $mysqli->close();

    return $data;
}

// function queryBringFileInformation($type){

//     include('connection.php');

//     $query = $mysqli->query("SELECT
//         ID_USER,
//         NAME,
//         DIR,
//         TYPE
//     FROM FILES
//     WHERE TYPE = '$type'");

//     $data = array();

//     while ($info = $query->fetch_object()) {
//         array_push($data, [
//             'ID_USER'=>$info->ID_USER,
//             'NAME'=>$info->NAME,
//             'DIR'=>$info->DIR,
//             'TYPE'=>$info->TYPE
//         ]);
//     }

//     $mysqli->close();

//     return $data;
// }

function queryBringClientInformationByMeter(){

    include('connection.php');

    $query = $mysqli->query("SELECT
        ID_CLIENT,
        (
            SELECT
                IFNULL(ID_METER, 0)
            FROM METER
            WHERE ID_CLIENT = CLIENT.ID_CLIENT
        ) AS ID_METER,
        NAME,
        LAST_NAME,
        IDENTITY,
        ADDRESS
    FROM CLIENT");

    $data = array();

    while ($info = $query->fetch_object()) {
        array_push($data, [
            'ID_CLIENT'=>$info->ID_CLIENT,
            'ID_METER'=>$info->ID_METER,
            'NAME'=>$info->NAME,
            'LAST_NAME'=>$info->LAST_NAME,
            'IDENTITY'=>$info->IDENTITY,
            'ADDRESS'=>$info->ADDRESS
        ]);
    }

    $mysqli->close();

    return $data;
}

function queryBringClientInformationByMeterAndIdClient($identify){

    include('connection.php');

    $query = $mysqli->query("SELECT
        CLIENT.ID_CLIENT,
        METER.ID_METER,
        METER.METER_NUMBER,
        METER.OLD_MEASURE,
        METER.NEW_MEASURE,
        METER.OLD_AMOUNT,
        METER.NEW_AMOUNT
    FROM METER
        INNER JOIN CLIENT ON CLIENT.ID_CLIENT = METER.ID_CLIENT
    WHERE METER.ID_CLIENT = $identify");

    $data = array();

    while ($info = $query->fetch_object()) {
        array_push($data, [
            'ID_CLIENT'=>$info->ID_CLIENT,
            'ID_METER'=>$info->ID_METER,
            'METER_NUMBER'=>$info->METER_NUMBER,
            'OLD_MEASURE'=>$info->OLD_MEASURE,
            'NEW_MEASURE'=>$info->NEW_MEASURE,
            'OLD_AMOUNT'=>$info->OLD_AMOUNT,
            'NEW_AMOUNT'=>$info->NEW_AMOUNT
        ]);
    }

    $mysqli->close();

    return $data;
}

function queryBringClientInformationByIdentity($identify){

    include('connection.php');

    $query = $mysqli->query("SELECT
        CLIENT.ID_CLIENT,
        CLIENT.IDENTITY,
        CLIENT.NAME,
        CLIENT.SECOND_NAME,
        CLIENT.LAST_NAME,
        CLIENT.SECOND_LAST_NAME,
        CLIENT.EMAIL,
        CLIENT.PHONE,
        CLIENT.ALTER_PHONE,
        CLIENT.ADDRESS,
        IFNULL(METER.NEW_AMOUNT, 'No existe esta informacion') AS NEW_AMOUNT,
        IFNULL(METER.METER_NUMBER, 'No existe esta informacion') AS METER_NUMBER
    FROM CLIENT
        LEFT JOIN METER ON METER.ID_CLIENT = CLIENT.ID_CLIENT
    WHERE CLIENT.IDENTITY = '$identify'");

    $data = array();

    while ($info = $query->fetch_object()) {
        array_push($data, [
            'ID_CLIENT'=>$info->ID_CLIENT,
            'IDENTITY'=>$info->IDENTITY,
            'NAME'=>$info->NAME,
            'SECOND_NAME'=>$info->SECOND_NAME,
            'LAST_NAME'=>$info->LAST_NAME,
            'SECOND_LAST_NAME'=>$info->SECOND_LAST_NAME,
            'EMAIL'=>$info->EMAIL,
            'PHONE'=>$info->PHONE,
            'ALTER_PHONE'=>$info->ALTER_PHONE,
            'ADDRESS'=>$info->ADDRESS,
            'NEW_AMOUNT'=>$info->NEW_AMOUNT,
            'METER_NUMBER'=>$info->METER_NUMBER
        ]);
    }

    $mysqli->close();

    return $data;
}

function queryBringUserInformation(){

    include('connection.php');

    $query = $mysqli->query("SELECT
        ID_USER,
        USER,
        ROL
    FROM USER
    ");

    $data = array();

    while ($info = $query->fetch_object()) {
        array_push($data, [
            'ID_USER'=>$info->ID_USER,
            'USER'=>$info->USER,
            'ROL'=>$info->ROL
        ]);
    }

    $mysqli->close();

    return $data;
}

function queryBringUserInformationById($identify){

    include('connection.php');

    $query = $mysqli->query("SELECT
        ID_USER,
        USER,
        ROL
    FROM USER
    WHERE ID_USER = $identify
    ");

    $data = array();

    while ($info = $query->fetch_object()) {
        array_push($data, [
            'ID_USER'=>$info->ID_USER,
            'USER'=>$info->USER,
            'ROL'=>$info->ROL
        ]);
    }

    $mysqli->close();

    return $data;
}

function queryBringFileInformation(){

    include('connection.php');

    $query = $mysqli->query("SELECT
        NAME,
        DIR
    FROM FILES
    ");

    $data = array();

    while ($info = $query->fetch_object()) {
        array_push($data, [
            'NAME'=>$info->NAME,
            'DIR'=>$info->DIR
        ]);
    }

    $mysqli->close();

    return $data;
}

function queryBringFileInformationByName($identify){

    include('connection.php');

    $query = $mysqli->query("SELECT
        NAME,
        DIR
    FROM FILES
    WHERE NAME LIKE '%$identify%'
    ");

    $data = array();

    while ($info = $query->fetch_object()) {
        array_push($data, [
            'NAME'=>$info->NAME,
            'DIR'=>$info->DIR
        ]);
    }

    $mysqli->close();

    return $data;
}

?>