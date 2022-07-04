<?php

function queryUpdateMeter($information){

    include('connection.php');

    $flag = 0;

    $idMeter = $information['idMeter'];
    $meterNumber = $information['meterNumber'];
    $oldMeter = $information['oldMeter'];
    $newMeter = $information['newMeter'];
    $oldAmount = $information['oldAmount'];
    $newAmount = $information['newAmount'];

    if($mysqli->query("UPDATE METER
    SET
        METER_NUMBER = '$meterNumber',
        OLD_MEASURE = '$oldMeter',
        NEW_MEASURE = '$newMeter',
        OLD_AMOUNT = $oldAmount,
        NEW_AMOUNT = $newAmount
    WHERE ID_METER = $idMeter
    ")){
        $flag = 1;
    }else{
        echo("Connection failed: " . $mysqli->connect_errno);
    }
    
    $mysqli->close();

    return $flag;
}

?>