<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $titulo; ?></title>
        <?php require 'layout-partial/require_css.php'; ?>
        <script src="<?php echo base_url(); ?>js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url(); ?>js/navigate.js"></script>
    </head>
    <body>
        <div class="container">    
            <div class="row">
                <img src="<?php echo base_url(); ?>imagenes/cabecera.jpg" class="img-responsive centrado" alt="57 SAC">
                <hr>
                <?php require 'layout-partial/nav_html.php' ?>
            </div>
            <div class="row">
                <?php echo $content_for_layout; ?> 
            </div>
            <div  class="row" style="height: 250px">
                <div col-md-12 class="text-center">
                    2000-2015
                </div>
                
            </div>
        </div>


        <!--data-toggle="modal" data-target="#mContForm"-->
        <script type="text/javascript">
            $(document).ready(function () {
                $('#bAbrirVenMod').click(function (event) {
                    event.preventDefault();
                    $('#mContForm2').load('http://localhost/acopitan/omar/intranet2015/src/index.php/user/create');
                });

                $('[data-toggle="popover"]').popover({html: true});

                $('.bEditUser').click(function (event) {
                    event.preventDefault();
                    var nId = $(this).data('id');
                    $('#mContForm').html('');
                    $.get('http://localhost/acopitan/omar/intranet2015/src/index.php/user/edit', {id: nId}, function (data) {
                        $('#mContForm').html(data);
                    });
                });
            });
        </script>
        <div class="modal fade" id="mContForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        </div>

        <div class="modal fade" id="mContForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        </div>
        anibal
        <?php require_once 'layout-partial/require_js.php';?>
    </body>
</html>





