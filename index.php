<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Junta de Riego Belisario Quevedo</title>

  <?php
    include('app/components/head.php');
  ?>

</head>

<body>

  <?php
    include('app/components/header.php');
  ?>

  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>¡Bienvenido al trabajo nuevamente!</h1>
          <h2>Ingresa tu usuario y contraseña para acceder al sistema</h2>
          <article id="contact" class="contact">
            <div class="container2" data-aos="fade-up">
      
              <div class="row">
      
                <div class="col-lg-7 d-flex align-items-stretch">
                  <form action="app/controller/login.php" method="POST" role="form" class="php-email-form">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="name">Usuario</label>
                        <input type="text" name="user" class="form-control" id="user" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="name">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                      </div>
                    </div>
                    <div class="my-3">
                      <div class="loading">Loading</div>
                      <div class="error-message"></div>
                      <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Ingresar</button></div>
                  </form>
                </div>
              </div>
            </div>
          </article>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="/public/assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section>

  <?php
    if (isset($_GET['failed'])) {
      if ($_GET['failed'] == 1) {
        echo '
          <div class="grid">
            <div class="error-card justify-center unit2">
              <p class="text-center text-white">Usuario o clave incorrectos</p>
            </div>
          </div>
        ';
      }
    }
  ?>

  <?php include('app/components/footer.php'); ?>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include('app/components/scripts.php'); ?>

</body>

</html>