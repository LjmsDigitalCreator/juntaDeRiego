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

  <section id="hero" class="hero d-flex align-items-center">

<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center">
      <h1 data-aos="fade-up" class="text-center">Bu&#769;squeda de informacio&#769;n</h1>
    </div>
  </div>
</div>

</section>

  <footer id="footer" class="footer col-12">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
            <h4>Ingrese la ce&#769;dula</h4>
          </div>
          <div class="col-lg-6">
              <input type="text" name="identity" id="identity">
              <button class="w-3 m-auto" onclick="Search();">Buscar</button>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <section id="pricing" class="pricing">

      <div class="container aos-init aos-animate" data-aos="fade-up">

        <header class="section-header">
          <p>Informacio&#769;n del cliente</p>
        </header>

        <div class="row gy-4 aos-init aos-animate" data-aos="fade-left">

          <div class="col-lg-12 col-md-12 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <img src="../../public/assets/img/pricing-free.png" class="img-fluid" alt="">
              <ul id="divInformation">
              </ul>
            </div>
          </div>

        </div>

      </div>

    </section>

    <?php include('../components/footer.php'); ?>

    <?php include('../components/scripts.php'); ?>

    <script>

li_menu.addEventListener("click", () => {
  if (navegator.getAttribute("class") == "navbar") {
    navegator.setAttribute("class", "navbar navbar-mobile");
  } else {
    navegator.setAttribute("class", "navbar");
  }
});

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
                        <li><strong>Nombre: </strong>${info[i]['NAME']}</li>
                        <li><strong>Segundo Nombre: </strong>${info[i]['SECOND_NAME']}</li>
                        <li><strong>Apellido: </strong>${info[i]['LAST_NAME']}</li>
                        <li><strong>Segundo Apellido: </strong>${info[i]['SECOND_LAST_NAME']}</li>
                        <li><strong>Ce&#769;dula: </strong>${info[i]['IDENTITY']}</li>
                        <li><strong>Correo electro&#769;nico: </strong>${info[i]['EMAIL']}</li>
                        <li><strong>Celular: </strong>${info[i]['PHONE']}</li>
                        <li><strong>Tele&#769;fono: </strong>${info[i]['ALTER_PHONE']}</li>
                        <li><strong>Direccio&#769;n: </strong>${info[i]['ADDRESS']}</li>
                        <li><strong>Nu&#769;mero del medidor: </strong>${info[i]['METER_NUMBER']}</li>
                        <li><strong>Monto a pagar: </strong>${info[i]['NEW_AMOUNT']}</li>
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