<?php

include('../model/clientModel.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(
        isset($_POST['fName']) && isset($_POST['sName']) && 
        isset($_POST['flName']) && isset($_POST['slName']) && 
        isset($_POST['identity']) && isset($_POST['email']) && 
        isset($_POST['phone']) && isset($_POST['alterPhone']) && 
        isset($_POST['address'])
    ){

        $information = array(
            "fName" => ucfirst(strtolower($_POST['fName'])),
            "sName" => ucfirst(strtolower($_POST['sName'])),
            "flName" => ucfirst(strtolower($_POST['flName'])),
            "slName" => ucfirst(strtolower($_POST['slName'])),
            "identity" => $_POST['identity'],
            "email" => $_POST['email'],
            "alterphone" => $_POST['alterphone'],
            "phone" => $_POST['phone'],
            "address" => $_POST['address']
        );

        $result = queryCreateClient($information);
        $result ? header('Location: ../view/client.php') : header('Location: ../view/client.php?failed=1');
        
    }
}

?>