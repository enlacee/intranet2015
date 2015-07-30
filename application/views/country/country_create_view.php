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
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Add New Country</h4>
    </div>
    <form id="frmCountry" method="POST" action="<?php echo site_url('country/create'); ?>">
    <div class="modal-body">      
        <div class="form-group">
          <label for="txtName">Name</label>
          <input type="text" name="name" class="form-control" id="txtName" maxlength="20">
        </div>
        <table class="table table-bordered table-hover table-fondo">                  
          <thead class="texto-centrado fontB">
            <td>Name</td>                      
            <td>Actión</td>
          </thead>
          <?php
          if (count($listcountry) > 0) {    
              foreach ($listcountry as $country) { ?>
                  <tr>
                      <td><?php echo $country->name; ?></td>                                                                      
                      <td style="text-align: center;"><a href="delete" class="btn btn-danger del-Country" data-id="<?php echo $country->id; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                  </tr>                       
          <?php }
          }
          ?>    
        </table>          
    </div>
    <div class="modal-footer">            
      <input type="submit" class="btn btn-primary comSeparator" value="Save">
      <a href="<?php echo site_url('supplier'); ?>" class="btn btn-default" data-dismiss="modal">Return</a>
    </div>
    </form>
  </div>
</div>
<script>
  $(document).ready(function() {

    $('#frmCountry').submit(function(event) {
      if ( $.trim($('input[name=name]').val()) == '' ) {
        event.preventDefault();         
        return false;
      } else {   
        event.preventDefault();  
        $.post('<?php echo site_url("country/create"); ?>', {name : $('input[name=name]').val()}, function(data) {
          $('#sltCountry').append('<option value="' + data + '" selected>' + $('input[name=name]').val() + '</option>');                    
          $('#mContForm').modal('hide');
        });
      }
    });

    // Mensaje de confirmacion
    var idCountry = 0;
    var nFila = 0;    

    $('table').on('click', 'a.del-Country', function(event) {
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
          $('table tbody tr:eq(' + nFila + ')').remove();          
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