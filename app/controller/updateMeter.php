<?php

include('../model/updateMeterModel.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(
        isset($_POST['idMeter']) && isset($_POST['meterNumber']) && isset($_POST['oldMeter']) &&
        isset($_POST['newMeter']) && isset($_POST['oldAmount']) && isset($_POST['newAmount'])
    ){

        $information = array(
            'idMeter' => $_POST['idMeter'],
            'meterNumber' => $_POST['meterNumber'],
            'oldMeter' => $_POST['oldMeter'],
            'newMeter' => $_POST['newMeter'],
            'oldAmount' => $_POST['oldAmount'],
            'newAmount' => $_POST['newAmount']
        );

        $result = queryUpdateMeter($information);
        $result ? header('Location: ../view/putData.php') : header('Location: ../view/putData.php?failed=1');
        
    }
}

?>