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

