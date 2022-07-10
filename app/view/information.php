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
    <div class="container d-flex flex-column align-items-center position-relative mt-5" data-aos="zoom-out">
      <h2 class="text-center">Bu&#769;queda de <span>documentos</span></h2>

      <footer id="footer" class="footer">
        <div class="footer-content">
          <div class="container">
            <div class="row">

              <div class="col-lg-12 col-md-12 footer-newsletter">
                <p class="text-center text-white">Ingrese el nombre del documento en la casilla que encuentra en la parte inferior, de esta manera podrá buscar el documento</p>
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
              <h4 class="text-center">Resultado de la bu&#769;squeda</h4>
              <div class="col-lg-12 col-md-12 footer-newsletter" id="divInformation">
              </div>
            </div>
          </div>
        </div>
      </footer>

    </div>

    <div class="container d-flex flex-column align-items-center position-relative mb-5" data-aos="zoom-out">
      <h2 class="text-center">Guardado de <span>documentos</span></h2>

      <footer id="footer" class="footer">
        <div class="footer-content">
          <div class="container">
            <div class="row">

              <div class="col-lg-12 col-md-12 footer-newsletter">
                <p class="text-center text-white">Ingrese el documento con el nombre que se guardara&#769; en el sistema</p>
                <form action="../api/uploadFile.php" id="forms" method="POST" role="form" enctype="multipart/form-data" class="php-email-form p-3">
                <div class="row" id="formData">

              <div class="form-group col-md-12">
                  <label for="name" class="text-black">Archivo</label>
                  <input type="file" class="form-control" name="fileUpload" id="fileUpload" required>
              </div>
            </div>

    <?php
        if (isset($_GET['s'])) {
            if ($_GET['s'] == 1) {
            echo'
              <div class="col-12">
                  <p class="text-center text-primary">Se subio el archivo correctamente</p>
              </div>
            ';
            }else{
              echo'
              <div class="col-12">
                  <p class="text-center text-danger">Error</p>
              </div>
            ';
            }
        }

    ?>
            <div class="col-9 row m-auto">
                </div>
                <div class="text-center p-3"><button class="btnSearch" id="btnClient" type="submit">Guardar</button></div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </footer>


    </div>
  </section>

  <section id="tables" class="contact">
        <div class="container2" data-aos="fade-up">

            <div class="col-12 row m-auto">

            <div class="col-lg-12 d-flex align-items-stretch">
                <table class="col-12 table table-striped table-hover table-bordered">
                  <thead>
                    <th width="100">Documento</th>
                  </thead>
                  <tbody id="tableClient"></tbody>
                </table>
            </div>
            </div>
        </div>
    </section>

    <?php include('../components/footer.php'); ?>

    <?php include('../components/scripts.php'); ?>

    <script src="../../public/assets/js/bringInformation.js"></script>

    <script>

      BringInformation();

      function Search(){

        let identify = document.getElementById('identity').value;

        $.ajax({
            type: "POST",
            url: "../controller/bringInfo.php",
            data: {
                option: 1,
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
                      <li><i class="ri-check-double-line"></i><strong>Documento: </strong>${info[i]['NAME']}</li>
                      <li><i class="ri-check-double-line"></i><strong>Ubicacio&#769;n: </strong><a href="${info[i]['DIR']}" target="_blank">${info[i]['NAME']}</a></li>
                      <br>
                    </ul>
                        `;
                    }
                
                $('#divInformation').html(divs);
                BringInformation();
            },
            error: function (error) {
                Console.log(`Error: ${error}`);
            }
        });
        }
    </script>

</body>

</html>