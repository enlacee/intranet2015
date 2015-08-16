<!-- MODAL 01 -->

<!-- Trigger the modal with a button 
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <p>Some text in the modal.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>-->

    </div>
</div>


<!-- MODAL 02 -->


<!-- Mensaje de Confirmacion -->
<div class="cont-mensaje cont-mensaje-1">
    <div class="mensaje">
        <div class="header-mensaje">
            <h4>Confirmar Eliminación</h4>
        </div>
        <div class="body-mensaje">
            <button id="delSi_" class="btn btn-danger">Si</button>
            <button id="delNo_" class="btn btn-primary my-modal-btn-no">No</button>
        </div>  
    </div>
</div>

<div class="modal fade in" id="mContForm" role="dialog" aria-hidden="false">

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
                    <table id="tableCountry" class="table table-bordered table-hover table-fondo">                  
                        <thead class="texto-centrado fontB">
                            <tr><td>Name</td>                      
                                <td>Actión</td>
                            </tr></thead>
                        <tbody>                                           
                            <tr>
                                <td>uk</td>                                                                      
                                <td style="text-align: center;"><a href="delete" class="btn btn-danger del-Country" data-id="17">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>

                        </tbody></table>
                </div>          
                <div class="modalPPie">          
                    <input type="submit" class="btn btn-primary" value="Save">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Return</button>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        // register items
        $('#frmAddCountry').submit(function(event) {
            event.preventDefault();
            if ($.trim($('input[name=name]').val()) == '') {
                $('input[name=name]').focus();
            } else {
                var URL = '<?php echo base_url() ?>';
                    URL+= 'supplier/country_create';
                var dataPost = {name: $('input[name=name]').val()}
                
                $.post(URL, dataPost, function(data) {
                    $('#sltCountry').append('<option value="' + data + '" selected>' + $('input[name=name]').val() + '</option>');
                    cFila = "<tr><td>" + $('input[name=name]').val() + "</td>";
                    cFila += '<td style="text-align: center;"><a href="delete" class="btn btn-danger del-Country" data-id="' + data + '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
                    $('#tableCountry tr:last').after(cFila);
                    $('#mContForm').modal('toggle');
                    
                    
                });
            }
            ;
        });

        $('#bCerrarMS').click(function(event) {
            event.preventDefault();
            $('div.porModal').fadeOut('500');
        });

        $('input[name=detectchange]').change(function(event) {
            if ($(this).is(':checked')) {
                $('input[name=credito]').val('1');
            } else {
                $('input[name=credito]').val('0');
            }
            ;
        });

        // Mensaje de confirmacion
        var idCountry = 0;
        var nFila = 0;

        $('#tableCountry').on('click', 'a.del-Country', function(event) {
            event.preventDefault();
            $('.cont-mensaje-1').fadeIn('500');
        });



        $('#delSi').click(function(event) {
            event.preventDefault();
            $.post('http://localhost/acopitan/omar/intranet2015/src/index.php/country/delete', {id: idCountry}, function(data) {
                if (data > 0) {
                    $('#tableCountry tbody tr:eq(' + nFila + ')').remove();
                    $('#sltCountry option[value=' + idCountry + ']').remove();
                    $('.cont-mensaje').fadeOut('500');
                } else {
                    $('.cont-mensaje').fadeOut('500');
                }
            });
        });
        // Fin del Mensaje de confirmación


        $('.my-modal-btn-no').click(function(event) {
            event.preventDefault();
            $(this).parent().parent().parent().fadeOut()
        });

    });
</script>
