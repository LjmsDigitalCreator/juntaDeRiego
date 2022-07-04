<?php

function queryDelete($id){

    include('connection.php');

    if($query = $mysqli->query("DELETE FROM USER WHERE ID_USER = $id")){
        $data = true;
    }else{
        $data = false;
    }

    $mysqli->close();

    return $data;
}

?>