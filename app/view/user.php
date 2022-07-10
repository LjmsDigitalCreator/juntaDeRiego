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
          <h1 class="text-white text-center">Gestio&#769;n de usuarios</h1>
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

          <div id="view" class="col-xl-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box w-100">
              <div class="icon"><i class="bx bx-list-ul"></i></div>
              <h4><button class="btnAlpha" onclick="BringInformationUser();">Ver</button></h4>
            </div>
          </div>

          <div id="form" class="col-xl-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box w-100">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><button class="btnAlpha">Crear</button></h4>
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
                    <th width="15">Usuario</th>
                    <th width="15">Rol</th>
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
                <form action="../controller/manageUser.php" id="forms" method="POST" role="form" class="php-email-form">
                <div class="row" id="formData"></div>
                <div class="text-center"><button id="btnClient" type="submit">Gestionar Usuario</button></div>
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

      let inputs = `
        <div class="form-group col-md-6">
            <label for="name">Usuario</label>
            <input type="text" name="user" class="form-control" id="user" required>
        </div>

        <div class="form-group col-md-6">
            <label for="name">Contraseña</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>

        <div class="form-group col-md-6">
            <label for="name">Primer apellido</label>
            <select class="form-control" name="rol" id="rol" require>
              <option value="root">Super usuario</option>
              <option value="annotator">Anotador</option>
              <option value="administrative">Administrativo</option>
            </select>
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
      $('#forms').attr("action", "../controller/manageUser.php");
    });

    BringInformationUser();

    function Delete(id){

      $.ajax({
          type: "POST",
          url: "../../app/controller/deleteUser.php",
          data: {
              id: id,
          },
          async: true,
          success: function (data) {
              BringInformationUser();
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
              option: 6,
              identify: identify,
          },
          async: true,
          success: function (data) {

              let info = $.parseJSON(data);

              $('#formData').html('');
              $('#forms').attr("action", "../controller/updateUser.php");

              let divs = '';

              for(let i = 0; i < info.length; i++){

                  let rol = '';

                  if(info[i]['ROL'] == 'annotator'){
                      rol = 'Anotador';
                  }else if(info[i]['ROL'] == 'root'){
                      rol = 'Super usuario';
                  }else{
                      rol = 'Administrativo';
                  }
                  
                  divs += `
                      <input type="hidden" name="idUser" class="form-control" value="${info[i]['ID_USER']}">
                      <div class="form-group col-md-6">
                          <label for="name">Usuario</label>
                          <input type="text" name="user" class="form-control" id="user" value="${info[i]['USER']}" required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="name">Contraseña</label>
                          <input type="password" class="form-control" name="password" id="password" value="" required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="name">Primer apellido</label>
                          <select class="form-control" name="rol" id="rol" require>
                            <option value="${info[i]['ROL']}" selected>${rol}</option>
                            <option value="root">Super usuario</option>
                            <option value="annotator">Anotador</option>
                            <option value="administrative">Administrativo</option>
                          </select>
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