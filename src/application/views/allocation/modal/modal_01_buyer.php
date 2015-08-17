<!-- MODAL 01 -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Buyer</h4>
            </div>
            <form id="form-buyer" name="form-buyer" method="POST" 
                  action="<?php echo base_url('buyer/create') ?>">
                <input type="hidden" name="request" value="1" />

                <div class="modal-body">      

                    <div class="table-responsive" style="height: 450px; padding: 0 15px 0 0;">
                        <!--inicio-->                    
                        <div class="form-group">
                            <label for="txtName">Name</label>
                            <input type="text" name="namebuyer" class="form-control required" id="txtName" required="" maxlength="25" autofocus="">
                        </div>      
                        <div class="form-group">
                            <label for="txtRuc">RUC</label>
                            <input type="text" name="ruc" class="form-control" id="txtRuc" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="txtAddress">Address</label>
                            <input type="text" name="address" class="form-control" id="txtAddress" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="txtWeb">Web</label>
                            <input type="text" name="web" class="form-control" id="txtWeb" maxlength="100">
                        </div>
                        <div class="form-group">
                            <label for="txtFax">Fax</label>
                            <input type="text" name="fax" class="form-control" id="txtFax" maxlength="15">
                        </div>
                        <div class="form-group">
                            <label for="txtTelephone">Telephone</label>
                            <input type="text" name="telephone" class="form-control" id="txtTelephone" maxlength="15">
                        </div>      
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label for="selCountry">Country</label>
                                    <select name="country" class="form-control" id="sltCountry" required="">
                                        <option value="">-</option>
                                        <?php if (count($list_country) > 0): ?>
                                            <?php foreach ($list_country as $country): ?>
                                                <option value="<?php echo $country->id; ?>"><?php echo $country->name ?></option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">no found</option>
                                        <?php endif; ?>
                                    </select>
                                </div>     
                                <div class="col-md-3">
                                    <a href="#" id="addCountry" class="btn btn-primary" style="margin-top: 26px; width: 100%;" data-toggle="modal" data-target="#myModal2" data-backdrop="static">Add</a>
                                </div>     
                            </div>
                        </div>      
                        <div class="form-group">
                            <label for="txtEmail">E-Mail</label>
                            <input type="email" name="email" class="form-control" id="txtEmail" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="txtObs">Description</label>
                            <textarea name="description" id="txtObs" class="form-control" rows="3" maxlength="250"></textarea>
                        </div>

                        <input type="submit" class="btn btn-primary comSeparator" value="Save">
                        <button class="btn btn-success" data-dismiss="modal">Return</button>
                        <!--fin-->
                    </div>  
                </div>
            </form>            
        </div>
    </div>
</div>

<!-- MODAL 02 -->
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

<div class="modal fade in" id="myModal2" role="dialog" aria-hidden="false">
    <!-- Modal Personalizado -->
    <div class="porModal" style="display: block;">
        <div class="cont-modalP">
            <div class="modalPTitulo">
                <p>Add New Country</p>        
            </div>
            <form id="frmAddCountry" action="<?php echo base_url('buyer/create') ?>" method="post" accept-charset="utf-8">
                <div class="modalPCuerpo">                
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control required" id="name" name="name">
                    </div>
                    <div class="table-responsive" style="height: 280px; padding: 0 15px 0 0;">
                        <table id="tableCountry" class="table table-condensed table-bordered table-hover table-fondo">                  
                            <thead class="texto-centrado fontB">
                                <tr><td>Name</td>                      
                                    <td>Actión</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($list_country) > 0): ?>
                                    <?php foreach ($list_country as $country): ?>
                                        <tr>
                                            <td><?php echo $country->name ?></td>
                                            <td>
                                                <a href="delete" class="btn btn-danger del-Country" data-id="<?php echo $country->id; ?>">
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#myModal').modal('show');
        // register items
        $('#frmAddCountry').submit(function(event) {
            event.preventDefault();
            if ($.trim($('input[name=name]').val()) == '') {
                $('input[name=name]').focus();
            } else {
                var URL = '<?php echo base_url() ?>';
                URL += 'supplier/country_create';
                var dataPost = {name: $('input[name=name]').val()}

                $.post(URL, dataPost, function(data) {
                    $('#sltCountry').append('<option value="' + data + '" selected>' + $('input[name=name]').val() + '</option>');
                    cFila = "<tr><td>" + $('input[name=name]').val() + "</td>";
                    cFila += '<td style="text-align: center;"><a href="delete" class="btn btn-danger del-Country" data-id="' + data + '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
                    $('#tableCountry tr:last').after(cFila);
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
            var URL = "<?php echo base_url('country/delete') ?>";
            var dataPost = {id: idCountry};
            $.post(URL, dataPost, function(data) {
                if (data > 0) {
                    $('#tableCountry tbody tr:eq(' + nFila + ')').remove();
                    $('#sltCountry option[value=' + idCountry + ']').remove();
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
<script type="text/javascript">
    $(document).ready(function() {
        var contact = $('#form-buyer');
        $(contact).validate({
            submitHandler: function(form) {
                var URL = contact.attr('action');
                $.post(URL, contact.serialize(), function(data) {
                    if (data == true) {
                        $('#myModal').modal('hide');
                        window.location = "<?php echo base_url('/allocation/create') ?>";
                    }
                });
            }
        });
    });
</script>
