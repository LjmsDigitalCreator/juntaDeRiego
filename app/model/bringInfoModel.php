<?php

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