<?php

$path = '/public/';

if(isset($_SESSION['user'])){
    $path = '../../public/';
}

echo '
    <script src="'. $path .'assets/vendor/purecounter/purecounter.js"></script>
    <script src="'. $path .'assets/vendor/aos/aos.js"></script>
    <script src="'. $path .'assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="'. $path .'assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="'. $path .'assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="'. $path .'assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="'. $path .'assets/vendor/php-email-form/validate.js"></script>

    <script src="'. $path .'assets/js/main.js"></script>
';


?>