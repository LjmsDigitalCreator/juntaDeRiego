<?php

include('../model/bringInfoModel.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $option = $_POST['option'];

    if($option == 0){
        echo json_encode(queryBringFileInformation());
    }else{
        echo json_encode(queryBringFileInformationByName($_POST['identify']));
    }

}

?>