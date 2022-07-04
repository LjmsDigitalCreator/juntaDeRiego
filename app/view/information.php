<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Junta de Riego Belisario Quevedo</title>
  <?php
    include('../components/head.php');
  ?>
</head>

<body>

<?php
    include('../components/header.php');
  ?>

  <section id="hero2" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1 class="text-white text-center">Solicitud de información</h1>
        </div>
      </div>
    </div>

  </section>

  <footer id="footer">

<div class="footer-newsletter">
<div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-6">
        <h4>Ingrese el número de cédula del cliente</h4>
        <p>Con el número de cédula podremos obtener al información de nuestra base de datos</p>
        <div>
          <input class="form-control" type="text" id="identity" name="identity">
          <button class="btn_search btnSearch" onclick="Search();">Buscar</button>
        </div>
    </div>
    </div>
</div>
</div>

</footer>

  <main id="main">

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Información del cliente</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" id="divInformation"></div>
        </div>

      </div>
    </section>

  </main>

    <?php include('../components/footer.php'); ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include('../components/scripts.php'); ?>

    <script>
      function Search(){

        let identify = document.getElementById('identity').value;

        $.ajax({
            type: "POST",
            url: "../controller/bringInfo.php",
            data: {
                option: 4,
                identify: identify,
            },
            async: true,
            success: function (data) {

                let info = $.parseJSON(data);
                
                console.log(info);

                $('#divInformation').html('');

                let divs = '';

                for(let i = 0; i < info.length; i++){

                    divs += `
                      <ul>
                        <li><i class="ri-check-double-line"></i><strong>Nombre: </strong>${info[i]['NAME']}</li>
                        <li><i class="ri-check-double-line"></i><strong>Segundo Nombre: </strong>${info[i]['SECOND_NAME']}</li>
                        <li><i class="ri-check-double-line"></i><strong>Apellido: </strong>${info[i]['LAST_NAME']}</li>
                        <li><i class="ri-check-double-line"></i><strong>Segundo Apellido: </strong>${info[i]['SECOND_LAST_NAME']}</li>
                        <li><i class="ri-check-double-line"></i><strong>Ce&#769;dula: </strong>${info[i]['IDENTITY']}</li>
                        <li><i class="ri-check-double-line"></i><strong>Correo electro&#769;nico: </strong>${info[i]['EMAIL']}</li>
                        <li><i class="ri-check-double-line"></i><strong>Celular: </strong>${info[i]['PHONE']}</li>
                        <li><i class="ri-check-double-line"></i><strong>Tele&#769;fono: </strong>${info[i]['ALTER_PHONE']}</li>
                        <li><i class="ri-check-double-line"></i><strong>Direccio&#769;n: </strong>${info[i]['ADDRESS']}</li>
                        <li><i class="ri-check-double-line"></i><strong>Nu&#769;mero del medidor: </strong>${info[i]['METER_NUMBER']}</li>
                        <li><i class="ri-check-double-line"></i><strong>Monto a pagar: </strong>${info[i]['NEW_AMOUNT']}</li>
                      </ul>
                        `;
                    }
                
                $('#divInformation').html(divs);
            },
            error: function (error) {
                Console.log(`Error: ${error}`);
            }
        });
        }
    </script>

</body>

</html>