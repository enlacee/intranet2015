<!-- MODAL 02 -->
<div class="modal fade in" id="myModal2" role="dialog" aria-hidden="false">
    <!-- Modal Personalizado -->
    <div class="porModal" style="display: block;">
        <div class="cont-modalP">
            <div class="modalPTitulo">
                <p>Add New Payment</p>        
            </div>
            <form id="myform" name="myform" action="<?php echo base_url('payment/create') ?>" method="post" accept-charset="utf-8">
                <div class="modalPCuerpo">                
                    <div class="form-group">
                        <label for="name">Payment</label>
                        <input type="text" class="form-control required" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="dias">Dias</label>
                        <input type="text" class="form-control required" id="dias" name="dias">
                    </div>
                    <div class="table-responsive" style="height: 280px; padding: 0 15px 0 0;">
                        <table id="tableCountry" class="table table-condensed table-bordered table-hover table-fondo">                  
                            <thead class="texto-centrado fontB">
                                <tr><td>Payment</td>
                                    <td>Días</td>
                                    <td>Actión</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($payments) > 0): ?>
                                    <?php foreach ($payments as $partner): ?>
                                        <tr>
                                            <td><?php echo $partner['payment'] ?></td>
                                            <td><?php echo $partner['dias'] ?></td>
                                            <td>
                                                <a href="delete" class="btn btn-danger del-Country" data-id="<?php echo $partner['id_payment']; ?>">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td>no found</td>
                                        <td>-</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>          
                <div class="modalPPie">          
                    <input type="submit" class="btn btn-primary" value="Save">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Return</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Mensaje de Confirmacion -->
<div class="cont-mensaje-modal cont-mensaje-1">
    <div class="mensaje">
        <div class="header-mensaje">
            <h4>Confirmar Eliminación</h4>
        </div>
        <div class="body-mensaje">
            <button id="delSi" class="btn btn-danger">Si</button>
            <button id="delNo" class="btn btn-primary">No</button>
        </div>  
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#myModal2').modal('show');
        // register items
        var $frmAddCountry = $('#myform');
        $frmAddCountry.submit(function(event) {
            event.preventDefault();
            if ($.trim($('input[name=name]').val()) == '') {
                $('input[name=name]').focus();
                alert('want to burn payment');
            } else {
                var URL = $frmAddCountry.attr('action');
                var dataPost = {name: $('input[name=name]').val(), dias: $('input[name=dias]').val()}

                $.post(URL, dataPost, function(data) {
                    $('#payment').append('<option value="' + data + '" selected>' + $('input[name=name]').val() + '</option>');
                    
                    cFila = "<tr><td>" + $('input[name=name]').val() + "</td>";
                    cFila += '<td><a href="delete" class="btn btn-danger del-Country" data-id="' + data + '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
                    $('#tableCountry tr:last').after(cFila);
                    $('input[name=name]').val('')
                    $('#myModal2').modal('toggle');
                });
            }
        });

        // Mensaje de confirmacion
        var idCountry = 0;
        var nFila = 0;
        $('#tableCountry').on('click', 'a.del-Country', function(event) {
            event.preventDefault();
            idCountry = $(this).data('id');
            nFila = $(this).parent().parent().index();
            $('.cont-mensaje-1').fadeIn('500');
        });

        $('#delSi').click(function(event) {
            event.preventDefault();
            var URL = "<?php echo base_url('payment/delete') ?>";
            var dataPost = {id: idCountry};
            $.post(URL, dataPost, function(data) {
                if (data > 0) {
                    $('#tableCountry tbody tr:eq(' + nFila + ')').remove();
                    $('#payment option[value=' + idCountry + ']').remove();
                    $('.cont-mensaje-1').fadeOut('500');
                } else {
                    $('.cont-mensaje-1').fadeOut('500');
                }
            });
        });
        // Fin del Mensaje de confirmación

        $('#delNo').click(function(event) {
            event.preventDefault();
            $('.cont-mensaje-1').fadeOut('500');
        });
    });
</script>

