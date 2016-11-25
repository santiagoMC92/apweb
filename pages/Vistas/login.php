<?php include(HTML_DIR . 'UI/header.php'); ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><img src="dist/img/logo.png" width="350px" height="150px"></a>
  </div>
  <!-- /.login-logo -->
  
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar sesión</p>

    <div id="_AJAX_LOGIN_"></div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" id="user_login">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" id="pass_login">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" id="session_login"> Recuerdame.
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button onclick="goLogin()">Sign In</button>
        </div>
        <!-- /.col -->
      </div>

    <!-- /.social-auth-links -->

    
    <script src="<?= PATH_COMPLEMENTO ?>dist/js/login.js"></script>
  </div>
  <!-- /.login-box-body -->
</div>
<?php include(HTML_DIR . 'UI/footer.php'); ?>
</body>