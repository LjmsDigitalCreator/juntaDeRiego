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

<section id="hero" class="hero d-flex align-items-center">

<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center">
      <h1 data-aos="fade-up" class="text-center">Informacio&#769;n del cliente</h1>
    </div>
  </div>
</div>

</section>

<main id="main">

  <section id="services" class="services section-bg m-auto">
      <div class="container m-auto m-3" data-aos="fade-up">

        <div class="row">

        <div id="view" class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box blue">
              <h3>Listado de clientes</h3>
            </div>
          </div>

          <div id="form" class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
            <div class="service-box orange">
              <h3>Registrar Cliente</h3>
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
                <form action="../controller/manageClient.php" id="forms" method="POST" role="form" class="php-email-form">
                <div class="row mb-3" id="formData"></div>
                <div class="text-center"><button id="btnClient" type="submit">Proceder</button></div>
                </form>
            </div>
            </div>
        </div>
    </section>
<main>

  <?php include('../components/footer.php'); ?>
  
  <?php include('../components/scripts.php'); ?>
  <script src="../../public/assets/js/bringInformation.js"></script>

  <script>

      let inputs = `
        <div class="form-group col-md-6">
            <label for="name">Primer nombre</label>
            <input type="text" name="fName" class="form-control" id="fName" required>
        </div>

        <div class="form-group col-md-6">
            <label for="name">Segundo nombre</label>
            <input type="text" class="form-control" name="sName" id="sName" required>
        </div>

        <div class="form-group col-md-6">
            <label for="name">Primer apellido</label>
            <input type="text" name="flName" class="form-control" id="flName" required>
        </div>

        <div class="form-group col-md-6">
            <label for="name">Segundo apellido</label>
            <input type="text" class="form-control" name="slName" id="slName" required>
        </div>

        <div class="form-group col-md-6">
            <label for="name">Ce&#769;dula</label>
            <input type="text" name="identity" class="form-control" id="identity" required>
        </div>

        <div class="form-group col-md-6">
            <label for="name">Correo electro&#769;nico</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="form-group col-md-6">
            <label for="name">Celular</label>
            <input type="text" name="phone" class="form-control" id="phone">
        </div>

        <div class="form-group col-md-6">
            <label for="name">Tele&#769;fono</label>
            <input type="text" class="form-control" name="alterPhone" id="alterPhone">
        </div>
        
        <div class="form-group col-md-12">
            <label for="name">Direccio&#769;n</label>
            <textarea type="text" class="form-control" name="address" id="address" required></textarea>
        </div>
        `;

    let table = document.getElementById("view");
    let form = document.getElementById("form");

    let tables = document.getElementById("tables");
    let contact = document.getElementById("contact");

    contact.style.display = 'none';

    table.addEventListener('click', ()=>{
      tables.style.display = 'block';
      contact.style.display = 'none';
    });

    form.addEventListener('click', ()=>{
      contact.style.display = 'block';
      tables.style.display = 'none';
      $('#formData').html('');
      $('#formData').html(inputs);
      $('#forms').attr("action", "../controller/manageClient.php");
    });

    BringInformation();

    function Delete(id){

      $.ajax({
          type: "POST",
          url: "../../app/controller/deleteClient.php",
          data: {
              id: id,
          },
          async: true,
          success: function (data) {
              BringInformation();
          },
          error: function (error) {
              modalText.innerHTML = `Error: ${error}`;
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
              option: 1,
              identify: identify,
          },
          async: true,
          success: function (data) {

              let info = $.parseJSON(data);

              $('#formData').html('');
              $('#forms').attr("action", "../controller/updateClient.php");

              let divs = '';

              for(let i = 0; i < info.length; i++){
                  
                  divs += `
                      <input type="hidden" name="idClient" class="form-control" value="${info[i]['ID_CLIENT']}">
                      <div class="form-group col-md-6">
                          <label for="name">Primer nombre</label>
                          <input type="text" name="fName" class="form-control" id="fName" value="${info[i]['NAME']}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="name">Segundo nombre</label>
                          <input type="text" class="form-control" name="sName" id="sName" value="${info[i]['SECOND_NAME']}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="name">Primer apellido</label>
                          <input type="text" name="flName" class="form-control" id="flName" value="${info[i]['LAST_NAME']}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="name">Segundo apellido</label>
                          <input type="text" class="form-control" name="slName" id="slName" value="${info[i]['SECOND_LAST_NAME']}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="name">Ce&#769;dula</label>
                          <input type="text" name="identity" class="form-control" id="identity" value="${info[i]['IDENTITY']}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="name">Correo electro&#769;nico</label>
                          <input type="email" class="form-control" name="email" id="email" value="${info[i]['EMAIL']}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="name">Celular</label>
                          <input type="text" name="phone" class="form-control" id="phone" value="${info[i]['PHONE']}">
                      </div>
                      <div class="form-group col-md-6">
                          <label for="name">Tele&#769;fono</label>
                          <input type="text" class="form-control" name="alterPhone" id="alterPhone" value="${info[i]['ALTER_PHONE']}">
                      </div>
                      <div class="form-group col-md-12">
                          <label for="name">Direccio&#769;n</label>
                          <textarea type="text" class="form-control" name="address" id="address" value="${info[i]['ADDRESS']}" required>${info[i]['ADDRESS']}</textarea>
                      </div>
                      `;
                  }
              
              $('#formData').html(divs);
          },
          error: function (error) {
              Console.log(`Error: ${error}`);
          }
      });
      }

  </script>

</body>

</html>