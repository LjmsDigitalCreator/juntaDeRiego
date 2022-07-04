<?php

include('../model/bringInfoModel.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $option = $_POST['option'];

    switch($option){
        case 0:
            echo json_encode(queryBringClientInformation());
            break;
        case 1:
            echo json_encode(queryBringClientInformationById($_POST['identify']));
            break;
        case 2:
            echo json_encode(queryBringClientInformationByMeter());
            break;
        case 3:
            echo json_encode(queryBringClientInformationByMeterAndIdClient($_POST['identify']));
            break;
        case 4:
            echo json_encode(queryBringClientInformationByIdentity($_POST['identify']));
            break;
        case 5:
            echo json_encode(queryBringUserInformation());
            break;
        case 6:
            echo json_encode(queryBringUserInformationById($_POST['identify']));
            break;
        default:
            echo json_encode(queryBringClientInformation());
            break;
    }

}

?>