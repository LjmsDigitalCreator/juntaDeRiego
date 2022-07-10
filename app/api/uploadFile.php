<?php

session_start();

include('../model/uploadFileModel.php');
include('index.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['fileUpload'])) {

        $fileTmpPath = $_FILES['fileUpload']['tmp_name'];
        $nameFile = $_FILES['fileUpload']['name'];
        
        $fileNameCmps = explode(".", $nameFile);
        $fileExtension = strtolower(end($fileNameCmps));

        $name = explode('/', $fileTmpPath);

        $newFileName = str_replace(" ", "", $nameFile);

        $allowedfileExtensions = array('zip', 'txt', 'xls', 'doc', 'docx', 'pdf', 'odt', 'rar');

        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = $_SERVER['DOCUMENT_ROOT'] . "/app/api/";
            $destinyPath = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $destinyPath)) {

                $result = UploadDrive('../api/'. $newFileName);

                if($result != ''){
                    echo $result;
                }
                if (registerUploadedFile($newFileName, $result)) {
                    header('Location: ../view/information.php?s=1');
                }else{
                    header('Location: ../view/information.php?s=2');
                }
            } 
            else {
                header('Location: ../view/information.php?s=2');
            }
        }

    }
}
