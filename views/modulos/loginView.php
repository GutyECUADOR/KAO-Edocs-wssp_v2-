<?php 
  
    if (isset($_SESSION["usuarioRUC"])){
        echo "Sigue Logeado";
        header('location:index.php?action=inicio');
        
    }

    $login = new controllers\loginController();
?>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">

        
        <div class="animate form login_form wrapshadow">
        <img src="<?php echo ROOT_PATH; ?>assets/images/logo.png" class="logo" alt="logokao">
          <section class="login_content">
              
              <?php 
                $login->actionCatcherController();
              ?>
              
            <form action="" method="POST" autocomplete="off">
              <h1>Ingreso a Sistema</h1>
              <div>
                <input type="text" class="form-control" name="txt_usuario" placeholder="Nombre de Usuario o RUC" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="txt_password" placeholder="Contraseña" required="" />
              </div>
              <div>
                <input type="submit" class="btn btn-default submit btn-block" name="action" value="Ingresar">
                <div class="clearfix"></div>
                <a href="#signup" class="to_register"> ¿Olvidaste tu contraseña? </a>
              </div>

             

              <div class="separator">
                <div>
                  <h1><i class="fa fa-lock"></i> Kao Sport Center</h1>
                  <p><?php echo date('Y')?> All Rights Reserved. v. <?php echo APP_VERSION?></p>
                  <p> Registrado para: <?php echo EMPRESA_NAME?></p>
                </div>
              </div>
            </form>
          </section>
        </div>
        <div class="login_wrapper">

        </div>
        <div id="register" class="animate form registration_form wrapshadow">
          <section class="login_content">

            <?php
              $login->resetPassword();
            ?>

            <form action="" method="POST" autocomplete="off">
              <h1>Recuperar Acceso</h1>
              <div>
                <p>
                1. Revisa antes que tus datos de acceso USUARIO y CONTRASEÑA se encuentren correctamente escritos y sin espacios. </br>
                2. Ingresa el e-mail que has registrado en los locales de KAOSPORT al momento de realizar tus compras. </br>
                3. Si no encuentras el e-mail con la clave de acceso en tu bandeja de entrada, revisa tu bandeja de correo no deseado.
                </p>
              </div>
              <div>
                <input type="email" class="form-control" name="txt_recuperaMail" placeholder="Email" required="" />
              </div>
              <div>
                <input type="submit" class="btn btn-default submit btn-block" name="action" value="Recuperar">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Ya tienes cuenta ?
                  <a href="#signin" class="to_register"> Ingresar </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-lock"></i> Kao Sport Center</h1>
                  <p><?php echo date('Y')?> All Rights Reserved. v. <?php echo APP_VERSION?></p>
                </div>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>

    <!-- jQuery -->
    <script src="<?php echo ROOT_PATH; ?>assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo ROOT_PATH; ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- PNotify -->
    <script src="<?php echo ROOT_PATH; ?>assets/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo ROOT_PATH; ?>assets/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo ROOT_PATH; ?>assets/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo ROOT_PATH; ?>assets/build/js/custom.js"></script>


    <script>
    $(document).ready(function() {
        new PNotify({
          title: 'Estimado Usuario',
          type: 'info',
          delay: 15000,
          text: 'Sus credenciales de inicio de sesión para primer ingreso; son su RUC o Cédula tanto para usuario y contraseña. Recuerde realizar el cambio de clave una vez ingrese.',
          nonblock: {
              nonblock: false
          },
          styling: 'bootstrap3',
          addclass: 'dark'
      });
   
});

</script>