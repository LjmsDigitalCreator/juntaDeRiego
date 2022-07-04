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
          <h1 class="text-white text-center">Gestio&#769;n de clientes</h1>
        </div>
      </div>
    </div>
  </section>

<main id="main">

    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Opciones</h2>
        </div>

        <div class="row">

          <div id="view" class="col-xl-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box w-100">
              <div class="icon text-center"><i class="bx bx-list-ul"></i></div>
              <h4 class="text-center"><button class="btnAlpha" onclick="BringInformationClientMeter();">Ver listado</button></h4>
            </div>
          </div>

        </div>

      </div>
    </section>
    
    <section id="tables" class="contact">
        <div class="container2" data-aos="fade-up">

            <div class="col-12 row m-auto">

            <div class="col-lg-12 d-flex align-items-stretch">
                <table class="col-12 table table-striped table-hover table-bordered">
                  <thead>
                    <th width="15">Nombre</th>
                    <th width="15">Apellido</th>
                    <th width="15">Ce&#769;dula</th>
                    <th width="45">Direccio&#769;n</th>
                    <th width="10">Opciones</th>
                  </thead>
                  <tbody id="tableClient"></tbody>
                </table>
            </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container2" data-aos="fade-up">

            <div class="col-9 row m-auto">

            <div class="col-lg-5 d-flex align-items-stretch">
                <form action="../controller/createMeter.php" id="forms" method="POST" role="form" class="php-email-form">
                <div class="row" id="formData"></div>
                <div class="text-center"><button id="btnClient" type="submit">Gestionar Informacio&#769;n</button></div>
                </form>
            </div>
            </div>
        </div>
    </section>
<main>

  <?php include('../components/footer.php'); ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  <?php include('../components/scripts.php'); ?>
  <script src="../../public/assets/js/bringInformation.js"></script>

  <script>

    let table = document.getElementById("view");
    let form = document.getElementById("form");

    let tables = document.getElementById("tables");
    let contact = document.getElementById("contact");

    contact.style.display = 'none';

    table.addEventListener('click', ()=>{
      tables.style.display = 'block';
      contact.style.display = 'none';
    });

    BringInformationClientMeter();

    function Delete(id){

      $.ajax({
          type: "POST",
          url: "../../app/controller/deleteClient.php",
          data: {
              id: id,
          },
          async: true,
          success: function (data) {
              BringInformationClientMeter();
          },
          error: function (error) {
              modalText.innerHTML = `Error: ${error}`;
          }
      });
    }

    function Create(identify){

        contact.style.display = 'block';
        tables.style.display = 'none';

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

                $('#formData').html('');
                $('#forms').attr("action", "../controller/createMeter.php");

                let divs = '';

                for(let i = 0; i < info.length; i++){
                    
                    divs += `
                        <input type="hidden" name="idClient" class="form-control" value="${info[i]['ID_CLIENT']}">
                        <div class="form-group col-md-12">
                            <label for="name">Nu&#769;mero del medidor</label>
                            <input type="text" name="meterNumber" class="form-control" id="meterNumber" value="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Lectura anterior</label>
                            <input type="text" name="oldMeter" class="form-control" id="oldMeter" value="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Nueva Lectura</label>
                            <input type="text" class="form-control" name="newMeter" id="newMeter" value="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Monto anterior a pagar</label>
                            <input type="text" name="oldAmount" class="form-control" id="oldAmount" value="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Monto actual a pagar</label>
                            <input type="text" class="form-control" name="newAmount" id="newAmount" value="" required>
                        </div>
                        `;
                    }
                
                $('#formData').html(divs);

                let oldMeter = document.getElementById("oldMeter");
                let newMeter = document.getElementById("newMeter");
                let newAmount = document.getElementById("newAmount");

                function CalculateAmount(){
                    let amount = 0;
                    amount = ((+newMeter.value || 0) - (+oldMeter.value || 0)) * 0.30;
                    newAmount.value = amount.toFixed(2);
                }

                oldMeter.addEventListener('keyup', ()=>{
                    CalculateAmount();
                });
                
                newMeter.addEventListener('keyup', ()=>{
                    CalculateAmount();
                });

            },
            error: function (error) {
                Console.log(`Error: ${error}`);
            }
        });
        }

    function Update(identify){

      contact.style.display = 'block';
      tables.style.display = 'none';

      $.ajax({
          type: "POST",
          url: "../controller/bringInfo.php",
          data: {
              option: 3,
              identify: identify,
          },
          async: true,
          success: function (data) {

              let info = $.parseJSON(data);

              $('#formData').html('');
              $('#forms').attr("action", "../controller/updateMeter.php");

              let divs = '';

              for(let i = 0; i < info.length; i++){

                  divs += `
                      <input type="hidden" name="idClient" class="form-control" value="${info[i]['ID_CLIENT']}">
                      <input type="hidden" name="idMeter" class="form-control" value="${info[i]['ID_METER']}">
                      <div class="form-group col-md-12">
                          <label for="name">Nu&#769;mero del medidor</label>
                          <input type="text" name="meterNumber" class="form-control" id="meterNumber" value="${info[i]['METER_NUMBER']}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="name">Lectura anterior</label>
                          <input type="text" name="oldMeter" class="form-control" id="oldMeter" value="${info[i]['OLD_MEASURE']}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="name">Nueva Lectura</label>
                          <input type="text" class="form-control" name="newMeter" id="newMeter" value="${info[i]['NEW_MEASURE']}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="name">Monto anterior a pagar</label>
                          <input type="text" name="oldAmount" class="form-control" id="oldAmount" value="${info[i]['OLD_AMOUNT']}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="name">Monto actual a pagar</label>
                          <input type="text" class="form-control" name="newAmount" id="newAmount" value="${info[i]['NEW_AMOUNT']}" required>
                      </div>
                      `;
                  }
              
              $('#formData').html(divs);

                let oldMeter = document.getElementById("oldMeter");
                let newMeter = document.getElementById("newMeter");
                let newAmount = document.getElementById("newAmount");

                function CalculateAmount(){
                    let amount = 0;
                    amount = ((+newMeter.value || 0) - (+oldMeter.value || 0)) * 0.30;
                    newAmount.value = amount.toFixed(2);
                }

                oldMeter.addEventListener('keyup', ()=>{
                    CalculateAmount();
                });
                
                newMeter.addEventListener('keyup', ()=>{
                    CalculateAmount();
                });
          },
          error: function (error) {
              Console.log(`Error: ${error}`);
          }
      });
    }

  </script>

</body>

</html>