<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Riego Belisario</title>

  <?php include('app/components/head.php') ?>

</head>

<body>

  <?php include('app/components/header.php') ?>

  <section id="hero-fullscreen" class="hero-fullscreen d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center position-relative" data-aos="zoom-out">
      <h2><span>Belisario Quevedo</span></h2>
      <p>Formulario de ingreso al sistema</p>
      
      <div class="container contact">

        <div class="row gy-5 gx-lg-5">

          <div class="col-lg-8">
            <form action="app/controller/login.php" method="post" role="form" class="php-email-form p-4">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="user" class="form-control" id="user" placeholder="Usuario" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required>
                </div>
              </div>
              <div class="text-center"><button type="submit">Ingresar</button></div>
            </form>
          </div>

        </div>

        </div>

    </div>
  </section>

  <?php include('app/components/footer.php') ?>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <?php include('app/components/scripts.php') ?>

</body>

</html>