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
    <div class="container-fluid">
  <div class="row">    
    <div class="col-md-12 color1">
      <img src="<?php echo base_url(); ?>imagenes/cabecera.jpg" class="img-responsive centrado" alt="57 SAC">
      <hr>
      <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav pos-relative">
                    <!-- para activar una opcion agregar: class="active"-->
                    <?php if ($this->session->userdata('profile') == "1") { ?>                  
                    <li>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMaster" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            MASTERS
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMaster">                            
                                <li><a href="<?php echo site_url('supplier'); ?>">Suppliers</a></li>
                                <li><a href="<?php echo site_url('user'); ?>">Users</a></li>
                                <li><a href="<?php echo site_url('buyer'); ?>">Buyers</a></li>
                                <li><a href="<?php echo site_url('product'); ?>">Products</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    <?php if ($this->session->userdata('profile') == "1") { ?>
                    <li><a href="#">LOGBOOK</a></li>
                    <?php } ?>
                    <?php if ($this->session->userdata('profile') == "1" || $this->session->userdata('profile') == "2") { ?>
                    <li><a href="#">CREDIT LINES</a></li>
                    <?php } ?>            
                    <?php if ($this->session->userdata('profile') == "1" || $this->session->userdata('profile') == "2" || $this->session->userdata('profile') == "3" || $this->session->userdata('profile') == "4") { ?>
                    <li><a href="#">REPORTS</a></li>
                    <?php } ?>
                    <?php if ($this->session->userdata('profile') == "1" || $this->session->userdata('profile') == "2" || $this->session->userdata('profile') == "3") { ?>
                    <li><a href="<?php echo site_url('allocation'); ?>">ALLOCATIONS</a></li>
                    <?php } ?>
                    <?php if ($this->session->userdata('profile') == "1") { ?>
                    <li>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownStatistics" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            STATISTICS
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownStatistics">
                                <li><a href="<?php echo site_url('user'); ?>">Allocations Total Income</a></li>
                                <li><a href="#">Allocations Accumulated Income</a></li>
                                <li><a href="#">Percentages Between Years</a></li>
                                <li><a href="#">Annual Comparison In Percentages</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    <li class="lst-user">
                        <span class="glyphicon glyphicon-user"></span>
                        <p><?php echo $this->session->userdata('login'); ?></p>
                    </li>
                  <li class="pos-absolute"><a class="btn btn-danger bsalir" href="<?php echo site_url('panel/salir'); ?>"><span class="glyphicon glyphicon-log-out"></span></a></li>
              </ul>
            </div>
          </div>
      </nav>