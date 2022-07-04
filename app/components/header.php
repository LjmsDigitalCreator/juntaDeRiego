<?php

session_start();

$menu = '
  <li><a class="nav-link scrollto" href="information.php">Obtener informacio&#769;n</a></li>
  <li><a class="nav-link scrollto" href="client.php">Gestionar Clientes</a></li>
';

if($_SESSION['rol'] == 'annotator'){
$menu .= '
    <li><a class="nav-link scrollto" href="putData.php">Lectura de medidores</a></li>
    ';
}

if($_SESSION['rol'] == 'root'){
  $menu .= '
      <li><a class="nav-link scrollto" href="putData.php">Lectura de medidores</a></li>
      <li><a class="nav-link scrollto" href="user.php">Gestio&#769;n de usuarios</a></li>
      ';
  }
  
$menu .= '<li><a class="nav-link scrollto" href="#team">Salir</a></li>';

echo '
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.html">Junta de Riego</a></h1>

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