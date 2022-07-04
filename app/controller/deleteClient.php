<?php

include('../model/deleteClientModel.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['id'];

    echo json_encode(queryDelete($id));
}

?>