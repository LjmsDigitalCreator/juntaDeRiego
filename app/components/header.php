<?php

session_start();

$menu = '
  <li><a class="nav-link scrollto" href="information.php">Buscar informacio&#769;n</a></li>
  <li><a class="nav-link scrollto" href="client.php">Informacio&#769;n de los Clientes</a></li>
';

if($_SESSION['rol'] == 'annotator'){
$menu .= '
    <li><a class="nav-link scrollto" href="putData.php">Informacio&#769;n de medidores</a></li>
    ';
}

if($_SESSION['rol'] == 'root'){
  $menu .= '
      <li><a class="nav-link scrollto" href="putData.php">Informacio&#769;n de medidores</a></li>
      <li><a class="nav-link scrollto" href="user.php">Informacio&#769;n de los Usuarios</a></li>
      ';
  }
  
$menu .= '<li><a class="nav-link scrollto" href="../../index.php">Salir</a></li>';

echo '
<header id="header" class="header fixed-top">
<div class="container-fluid container-xl d-flex align-items-center justify-content-between">

  <a href="index.html" class="logo d-flex align-items-center">
    <img src="/public/assets/img/logo.png" alt="">
    <span>Junta de Riego Belisario Quevedo</span>
  </a>

  <nav id="navbar" class="navbar">
    <ul>
      '. $menu .'
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav>

</div>
</header>
';

?>