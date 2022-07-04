<?php

include('../model/deleteUserModel.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['id'];

    echo json_encode(queryDelete($id));
}

?>