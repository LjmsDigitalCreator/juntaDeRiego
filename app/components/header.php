<?php

session_start();

$menu = '
  <li><a class="nav-link scrollto" href="information.php">Consultar informacio&#769;n</a></li>
  <li><a class="nav-link scrollto" href="client.php">Clientes</a></li>
';

if($_SESSION['rol'] == 'annotator'){
$menu .= '
    <li><a class="nav-link scrollto" href="putData.php">Informacio&#769;n de medidores</a></li>
    ';
}

if($_SESSION['rol'] == 'root'){
  $menu .= '
      <li><a class="nav-link scrollto" href="putData.php">Informacio&#769;n de medidores</a></li>
      <li><a class="nav-link scrollto" href="user.php">Usuarios</a></li>
      ';
  }
  
$menu .= '<li><a class="nav-link scrollto" href="../../index.php">Salir</a></li>';

echo '
<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <h1>Riego Belisario Quevedo<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          '. $menu .'
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav>

    </div>
  </header>
';

?>