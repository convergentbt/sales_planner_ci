<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dabur Sales Planner | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url("assets/plugins/fontawesome-free/css/all.min.css") ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url("assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css") ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url("assets/dist/css/adminlte.min.css") ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><a href="../../index2.html"><img src="<?= base_url("assets/dist/img/logo.png")?>" alt="User Avatar" class="img-size-64 mr-3" ></a>
</p>
<?php if($error = $this->session->flashdata('login_failed')){?>
<div class="row">
  <div class="col-12">
    <div class="alert alert-danger">
      <?php echo $error; ?>
    </div>
  </div>
</div>
<?php } ?>
    <?php echo form_open('Admin/index'); ?>
        <div class="input-group mb-3">
		 <?php
		 $usernamedata = array(
				 'class' => 'form-control', 'placeholder' => 'Enter User Name', 'name' => 'username', 'value' => set_value('username')
		 );
		  echo form_input($usernamedata); ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
			<?php
			$passworddata = array(
					'class' => 'form-control', 'placeholder' => 'Enter Password', 'name' => 'password', 'type' => 'password', 'value' => set_value('password')
			);
		  echo form_password($passworddata); ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->
      
          <div class="col-12">
          <?php
		  $formsubmitdata = array('class' => 'btn btn-success btn-block float-right', 'type' => 'submit', 'value' => 'Sign In');
		  echo form_submit($formsubmitdata); ?>
          </div>
          <!-- /.col -->
        </div>

      <div class="social-auth-links text-center mb-3">
      
        <!-- <a href="#" class="btn btn-block btn-primary">
        I forgot my password
        </a> -->
        <a href="#" style="color: forestgreen">
        I forgot my password
        </a>
      </div>
      <!-- /.social-auth-links -->

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url("assets/plugins/jquery/jquery.min.js") ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url("assets/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url("assets/dist/js/adminlte.min.js") ?>"></script>

</body>
</html>
