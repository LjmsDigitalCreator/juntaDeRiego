<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Junta de Riego Belisario Quevedo</title>

  <?php include('app/components/head.php') ?>

</head>

<body>

<?php include('app/components/header.php') ?>

  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up" class="text-center">Sistema administrativo Belisario Quevedo</h1>
          <h2 data-aos="fade-up" data-aos-delay="400" class="text-center">Acceda al sistema con su usuario y clave</h2>

          <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

          <div class="col-lg-6">
            <form action="app/controller/login.php" method="post" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="user" class="form-control" placeholder="Ingrese el usuario" required>
                </div>

                <div class="col-md-6 ">
                  <input type="password" class="form-control" name="password" placeholder="Ingrese la clave" required>
                </div>

                <div class="col-md-12 text-center">
                  <button type="submit">Ingresar</button>
                </div>

              </div>
            </form>

          </div>

        </div>

      </div>

    </section>

        </div>
      </div>
    </div>

  </section>

  <?php include('app/components/footer.php') ?>

  <?php include('app/components/scripts.php') ?>

</body>

</html>