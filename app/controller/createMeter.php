<?php

include('../model/createMeterModel.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $information = array(
        "idClient" => $_POST['idClient'],
        "meterNumber" => $_POST['meterNumber'],
        "oldMeter" => $_POST['oldMeter'],
        "newMeter" => $_POST['newMeter'],
        "oldAmount" => $_POST['oldAmount'],
        "newAmount" => $_POST['newAmount']
    );

    $result = queryCreateMeterByClientId($information);

    $result ? header('Location: ../view/putData.php') : header('Location: ../view/putData.php?failed=1');

}

?>