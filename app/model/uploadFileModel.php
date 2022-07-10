<?php
    function registerUploadedFile($fileName, $uploadDirectory){
        include('connection.php');

        if ($mysqli->query("INSERT INTO FILES (NAME, DIR) VALUES ('$fileName', '$uploadDirectory')")) {
            $flag = 1;
            echo "Information inserted successfully";
        }else{
            echo("Connection failed: " . $mysqli->connect_errno);
        }
        
        $mysqli->close();
    
        return $flag;

    }
