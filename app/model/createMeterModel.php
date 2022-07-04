<?php

function queryCreateMeterByClientId($information){

    include('connection.php');

    $flag = 0;

    $idClient = $information['idClient'];
    $meterNumber = $information['meterNumber'];
    $oldMeter = $information['oldMeter'];
    $newMeter = $information['newMeter'];
    $oldAmount = $information['oldAmount'];
    $newAmount = $information['newAmount'];

    if($mysqli->query("INSERT INTO METER(
        ID_CLIENT,
        METER_NUMBER,
        OLD_MEASURE,
        NEW_MEASURE,
        OLD_AMOUNT,
        NEW_AMOUNT
    ) VALUES(
        $idClient,
        '$meterNumber',
        '$oldMeter',
        '$newMeter',
        $oldAmount,
        $newAmount
    )")){
        $flag = 1;
    }
    
    $mysqli->close();

    return $flag;
}

?>