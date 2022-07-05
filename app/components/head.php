<?php

$path = '/public/';

if(isset($_SESSION['user'])){
    $path = '../../public/';
}

echo '
    <!-- Favicons -->
    <link href="'. $path .'assets/img/favicon.png" rel="icon">
    <link href="'. $path .'assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <link href="'. $path .'assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="'. $path .'assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="'. $path .'assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="'. $path .'assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="'. $path .'assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="'. $path .'assets/css/variables.css" rel="stylesheet">

    <link href="'. $path .'assets/css/main.css" rel="stylesheet">
    
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
';

?>