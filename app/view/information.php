<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Riego Belisario</title>

  <?php include('../components/head.php') ?>

</head>

<body>

  <?php include('../components/header.php') ?>

  <section id="hero-fullscreen" class="hero-fullscreen d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center position-relative" data-aos="zoom-out">
      <h2>Informacio&#769;n de los <span>clientes</span></h2>

      <footer id="footer" class="footer">
        <div class="footer-content">
          <div class="container">
            <div class="row">

              <div class="col-lg-12 col-md-12 footer-newsletter">
                <p class="text-center text-white">En la casilla que se encuentra debajo, coloque el nu&#769;mero de ce&#769;dula para obtener la informacio&#769;n del cliente</p>
                <div class="justify-content-center">
                  <input type="text" class="inputSearch" name="identity" id="identity"><button class="btnSearch" onclick="Search();">Consultar</button>
                </div>
              </div>

            </div>
          </div>
        </div>
      </footer>

      <footer id="footer" class="footer mt-3">
        <div class="footer-content">
          <div class="container">
            <div class="row">
              <h4 class="text-center">Datos del cliente</h4>
              <div class="col-lg-12 col-md-12 footer-newsletter" id="divInformation">
              </div>

            </div>
          </div>
        </div>
      </footer>

    </div>
  </section>

    <?php include('../components/footer.php'); ?>

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