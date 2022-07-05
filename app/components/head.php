<?php

$path = '/public/';

if(isset($_SESSION['user'])){
    $path = '../../public/';
}

echo '
    <link href="'. $path .'assets/img/favicon.png" rel="icon">
    <link href="'. $path .'assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
    <link href="'. $path .'assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="'. $path .'assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="'. $path .'assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="'. $path .'assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="'. $path .'assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="'. $path .'assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
    <link href="'. $path .'assets/css/style.css" rel="stylesheet">
    
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
';

?>