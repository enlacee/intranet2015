<!-- Mensaje de Confirmacion para eliminar Country -->
<div class="cont-mensaje">
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
<!-- Fin Mensaje de Confirmacion para eliminar Country -->
<!-- Modal Personalizado -->
<div class="porModal">
  <div class="cont-modalP">
    <div class="modalPTitulo">
      <p>Add New Country</p>        
    </div>
    <form id="frmAddCountry" action="<?php echo site_url('supplier/country_create'); ?>" method="post" accept-charset="utf-8">
      <div class="modalPCuerpo">                
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>                     
          <table id="tableCountry" class="table table-bordered table-hover table-fondo">                  
            <thead class="texto-centrado fontB">
              <td>Name</td>                      
              <td>Actión</td>
            </thead>
            <?php
            if (count($list_country) > 0) {    
                foreach ($list_country as $country) { ?>
                    <tr>
                        <td><?php echo $country->name; ?></td>                                                                      
                        <td style="text-align: center;"><a href="delete" class="btn btn-danger del-Country" data-id="<?php echo $country->id; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                    </tr>                       
            <?php }
            }
            ?>    
          </table>
      </div>          
      <div class="modalPPie">          
        <input type="submit" class="btn btn-primary" value="Save">                
        <button id="bCerrarMS" class="btn btn-default">Return</button>
      </div>
    </form>
  </div>
</div>
<!-- Fin Modal Personalizado -->

<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Edit Suppliers</h4>
    </div>
    <form method="POST" action="<?php echo site_url('supplier/edit'); ?>">
      <div class="modal-body">      
        <div class="form-group">
          <label for="txtName">Name</label>
          <input type="text" name="nombres" class="form-control" id="txtName" value="<?php echo $supplier->nombres; ?>" required maxlength="25">
        </div>      
        <div class="form-group">
          <label for="txtTelephone">Telephone</label>
          <input type="text" name="telefono" class="form-control" id="txtNTelephone" value="<?php echo $supplier->telefono; ?>" required maxlength="15">
        </div>
        <div class="form-group">
          <label for="txtCellular">Cellular</label>
          <input type="text" name="celular" class="form-control" id="txtCellular" value="<?php echo $supplier->celular; ?>" maxlength="15">
        </div>
        <div class="form-group">
          <label for="txtAddress">Address</label>
          <input type="text" name="direccion" class="form-control" id="txtAddress" value="<?php echo $supplier->direccion; ?>" maxlength="50">
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-9">
              <label for="selCountry">Country</label>
              <select name="pais" class="form-control" id="sltCountry" required>
                <option value="0">::No definido::</option>
                <?php 
                  if (count($list_country) > 0) {
                    foreach ($list_country as $country) { ?>                  
                      <option value="<?php echo $country->id; ?>" <?php if ($country->id == $supplier->pais) {echo "selected";} ?>><?php echo $country->name; ?></option>
                <?php    }
                  }
                ?>                
              </select>
            </div>     
            <div class="col-md-3">
              <button id="mModalSup" class="btn btn-info" style="margin-top: 25px; width: 100%; height: 39px;">Add</button>
            </div>     
          </div>
        </div>
        <div class="form-group">
          <label for="txtEmail">E-Mail</label>
          <input type="email" name="email" class="form-control" id="txtEmail" value="<?php echo $supplier->email; ?>" maxlength="50">
        </div>
        <div class="form-group">
          <label for="txtObs">Observers</label>
          <textarea name="observaciones" id="txtObs" class="form-control" rows="3" maxlength="250"><?php echo $supplier->observaciones; ?></textarea>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="detectchange" <?php if ($supplier->credito == 1) { echo "checked"; } ?>> Credit Available
          </label>
        </div>
        <input type="hidden" name="estado" value="a">        
      </div>
    <div class="modal-footer">
      <input type="hidden" name="credito" value="0">
      <input type="hidden" name="id" value="<?php echo $supplier->id; ?>">          
      <input type="submit" class="btn btn-primary comSeparator" value="Save">
      <a href="<?php echo site_url('supplier'); ?>" class="btn btn-default" data-dismiss="modal">Return</a>
    </div>
    </form>
  </div>
</div>
<script>
  $(document).ready(function() {  
    $('#mModalSup').click(function(event) {
        event.preventDefault();
        $('div.porModal').fadeIn('500');
        $('input[name=name]').focus();
    });

    $('#frmAddCountry').submit(function(event) {            
      event.preventDefault();
      if ( $.trim($('input[name=name]').val()) == '' ) {
        $('input[name=name]').focus();
      } else{
        $.post('<?php echo site_url('supplier/country_create'); ?>', {name: $('input[name=name]').val()}, function(data) {          
          $('#sltCountry').append('<option value="' + data + '" selected>' + $('input[name=name]').val() + '</option>');
          cFila = "<tr><td>" + $('input[name=name]').val() + "</td>";          
          cFila += '<td style="text-align: center;"><a href="delete" class="btn btn-danger del-Country" data-id="' + data + '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
          $('#tableCountry tr:last').after(cFila);
          $('div.porModal').fadeOut('500');  
        });        
      };     
    });

    $('#bCerrarMS').click(function(event) {
      event.preventDefault();
      $('div.porModal').fadeOut('500');
    });

    $('input[name=detectchange]').change(function(event) {
      if ($(this).is(':checked')) {
        $('input[name=credito]').val('1');
      } else{
        $('input[name=credito]').val('0');
      };
    });

    // Mensaje de confirmacion
    var idCountry = 0;
    var nFila = 0;    

    $('#tableCountry').on('click', 'a.del-Country', function(event) {
      event.preventDefault();
      idCountry = $(this).data('id');
      nFila = $(this).parent().parent().index();      
      $('.cont-mensaje').fadeIn('500');
    });

    $('#delNo').click(function(event) {
      event.preventDefault();
      $('.cont-mensaje').fadeOut('500');
    });

    $('#delSi').click(function(event) {
      event.preventDefault();      
      $.post('<?php echo site_url("country/delete"); ?>', {id : idCountry}, function(data) {
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
  }); 
</script>