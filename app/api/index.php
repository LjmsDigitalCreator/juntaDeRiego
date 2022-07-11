<?php

function UploadDrive($file_path){
    include('./api-google/vendor/autoload.php');
    
    putenv('GOOGLE_APPLICATION_CREDENTIALS=apiphp-355915-b54d4d360ffc.json');
    
    $client = new Google_Client();
    
    $client->useApplicationDefaultCredentials();
    $client->SetScopes(['https://www.googleapis.com/auth/drive.file']);
    
    try{
        $service = new Google_Service_Drive($client);
    
        $file = new Google_Service_Drive_DriveFile();
        $file->setName($file_path);
    
        $file->setParents(array("1d8q-OOD3CNN8fkRstsoesu7Id0yjbKH8")); // Este identificador se obtiene de la url de la ruta de la carpeta que creamos en el drive
        $file->setDescription("File upload from php");
    
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file_path);
    
        $file->setMimeType($mimeType);
    
        $result = $service->files->create(
            $file,
            array(
                'data' => file_get_contents($file_path),
                'mimeType' => $mimeType,
                'uploadType' => "media"
            )
        );
    
        // 'https://drive.google.com/open?id=' . $result->id
    
        return 'https://drive.google.com/open?id=' . $result->id;
    }catch(Google_Service_Exception $gs){
        $message = json_decode($gs->getMessage());
        echo $message->error->message;
    } catch(Exception $e){
        echo $e->getMessage();
    }
}


?>