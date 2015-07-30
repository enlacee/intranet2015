<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $titulo; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/cssespecial.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/datepicker.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
    <script src="<?php echo base_url(); ?>js/jquery-1.10.2.min.js"></script>
  </head>
  <body>

<div class="container">
<br />
<br />
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="panel panel-default padd-normal">
          <div class="panel-body">
            <div class="page-header">
              <h3 class="texto-centrado">Acceso del Sistema</h3>
            </div>
          </div>          
          <?php
          if(validation_errors()){
            echo '<div class="alert alert-warning alert-dismissible" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<strong>Error: </strong>' . validation_errors();
            echo '</div>';
          };
          ?>
          <?php
            $user = array('name' => 'username', 'class' => 'form-control', 'maxlength' => 15, 'required' => 'true');
            $password = array('name' => 'userpassword', 'class' => 'form-control', 'maxlength' => 15, 'required' => 'true');
            $submit = array('name' => 'submit', 'value' => 'INICIAR SESIÓN', 'title' => 'INICIAR SESIÓN', 'class' => 'btn btn-primary btn-lg centrado');
          ?>
          <?=form_open(site_url('login/validar_user'))?>
            <div class="form-group">
              <label>Usuario</label>
              <?php echo form_input($user); ?>
            </div>
            <div class="form-group">
              <label>Contraseña</label>
              <?php echo form_password($password); ?>
            </div>
            <hr />
            <?php echo form_hidden('token',$token)?>
            <?php echo form_submit($submit); ?>
          <?php form_close(); ?>
          <?php
            if($this->session->flashdata('err_user'))              
            {
            ?>
            <p><br></p>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error: </strong> <?=$this->session->flashdata('err_user')?>
            </div>
            <?php
            }
          ?>
    </div>
    <div class="col-md-4"></div>
    </div>
  </div>
</div>

<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
</body>
</html>