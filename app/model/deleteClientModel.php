<?php

function queryDelete($id){

    include('connection.php');

    if($query = $mysqli->query("DELETE FROM CLIENT WHERE ID_CLIENT = $id")){
        $data = true;
    }else{
        $data = false;
    }

    $mysqli->close();

    return $data;
}

?>