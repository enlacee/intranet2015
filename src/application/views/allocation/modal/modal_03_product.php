<!-- MODAL 01 -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Product</h4>
            </div>
            <form id="myform" name="myform" method="POST" action="<?php echo base_url('product/create') ?>">
                <input type="hidden" name="request" value="json" />
                
                <div class="modal-body">
                    <div class="table-responsive" style="height: 450px; padding: 0 15px 0 0;">
                        <!--inicio-->                    
                        <div class="form-group">
                            <label for="txtName">Category</label>
                            <select name="id_category" class="form-control required" id="id_category">
                                <option value="">-</option>
                                <?php if (count($list_category) > 0): ?>
                                    <?php foreach ($list_category as $category): ?>
                                        <?php $selected = ($id_category == $category->id) ? 'selected' : '' ?>
                                        <option value="<?php echo $category->id; ?>" <?php echo $selected ?>><?php echo $category->name; ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="">no found</option>
                                <?php endif; ?>
                            </select>                            
                        </div>      
                        <div class="form-group">
                            <label for="txtName">Supplier</label>
                            <select name="id_supplier" class="form-control required" id="id_supplier">
                                <option value="">-</option>
                                <?php if (count($empleados) > 0): ?>
                                    <?php foreach ($empleados as $key => $array): ?>
                                        <?php $selected = ($id_proveedor == $array['id']) ? 'selected' : '' ?>
                                        <option value="<?php echo $array['id']; ?>" <?php echo $selected ?>><?php echo $array['nombres']; ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="">no found</option>
                                <?php endif; ?>
                            </select>  
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control required" id="name" maxlength="15">
                        </div>
   
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" maxlength="250"></textarea>
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
<div class="modal fade in" id="myModal2" role="dialog" aria-hidden="false">
    <!-- Modal Personalizado -->
    <div class="porModal" style="display: block;">
        <div class="cont-modalP">
            <div class="modalPTitulo">
                <p>Add New Country</p>        
            </div>
            <form id="frmAddCountry" action="<?php echo base_url('country/create') ?>" method="post" accept-charset="utf-8">
                <div class="modalPCuerpo">                
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control required" id="namex" name="namex">
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
        $('#myModal').modal('show');
        // register items
        var $frmAddCountry = $('#frmAddCountry');
        $frmAddCountry.submit(function(event) {
            event.preventDefault();
            if ($.trim($('input[name=name]').val()) == '') {
                $('input[name=name]').focus();
            } else {
                var URL = $frmAddCountry.attr('action');
                var dataPost = {name: $('input[name=name]').val()}

                $.post(URL, dataPost, function(data) {
                    $('#sltCountry').append('<option value="' + data + '" selected>' + $('input[name=name]').val() + '</option>');
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
        var contact = $('#myform');
        $(contact).validate({
            submitHandler: function(form) {
                var URL = contact.attr('action');
                $.post(URL, contact.serialize(), function(data) {
                    if (data) {
                        var $select = $('#id_producto');
                        var name = $('#myform')[0][3].value;
                        $select
                            .append($("<option></option>")
                            .attr("value", data)
                            .text(name));
                        $select.val(data);
                        $('#myModal').modal('hide');
                    } else {
                        alert("error request")
                    }
                });   
            }
        });
    });
</script>

