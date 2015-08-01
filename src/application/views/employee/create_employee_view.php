<!-- Mensaje de Confirmacion para eliminar inside -->
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
<!-- Fin Mensaje de Confirmacion para eliminar inside -->
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Add New Inside Pers</h4>
    </div>
    <form id="addEmp" method="POST" action="<?php echo site_url('employee/create'); ?>">
    <div class="modal-body">      
        <div class="form-group">
          <label for="txtName">Name</label>
          <input type="text" name="nameInside" class="form-control pressEnter" id="txtName" maxlength="20">
        </div>
        <table class="table table-bordered table-hover table-fondo">                  
          <thead class="texto-centrado fontB">
            <td>Name</td>
            <td>State</td>            
            <td>Actión</td>
          </thead>
          <?php
          if (count($listinside) > 0) {    
              foreach ($listinside as $inside) { ?>
                  <tr>
                      <td><?php echo $inside->fullname; ?></td>
                      <td><?php echo $inside->status; ?></td>                                                    
                      <td style="text-align: center;"><a href="delete" class="btn btn-danger del-inside" data-id="<?php echo $inside->id; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                  </tr>                       
          <?php }
          }
          ?>    
      </table>            
    </div>
    <div class="modal-footer">            
      <input type="submit" class="btn btn-primary comSeparator" value="Save">
      <button class="btn btn-default" data-dismiss="modal">Return</button>
    </div>
    </form>
  </div>
</div>
<script>
  $(document).ready(function() {  

    // Mensaje de confirmacion
    var idInside = 0;
    var nFila = 0;    

    $('table').on('click', 'a.del-inside', function(event) {
      event.preventDefault();
      idInside = $(this).data('id');
      nFila = $(this).parent().parent().index();
      $('.cont-mensaje').fadeIn('500');
    });

    $('#delNo').click(function(event) {
      event.preventDefault();
      $('.cont-mensaje').fadeOut('500');
    });

    $('#delSi').click(function(event) {
      event.preventDefault();      
      $.post('<?php echo site_url("employee/delete"); ?>', { id : idInside }, function(data, textStatus, xhr) {
        if (data > 0) {          
          $('table tbody tr:eq(' + nFila + ')').remove();
          $('#selEmployee option[value=' + idInside + ']').remove();
          $('.cont-mensaje').fadeOut('500');
        } else {
          $('.cont-mensaje').fadeOut('500');
        }
      });
    });
    // Fin del Mensaje de confirmación
    $('#addEmp').submit(function(event) {
      event.preventDefault();      
      $.post('<?php echo site_url("employee/create"); ?>', { fullname : $('input[name=nameInside]').val(), status : 'a' }, function(data) {        
        cFila = "<tr><td>" + $('input[name=nameInside]').val() + "</td>";
        cFila += "<td>a</td>";
        cFila += '<td style="text-align: center;"><a href="delete" class="btn btn-danger del-inside" data-id="' + data + '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
        $('table tr:last').after(cFila);
        $('#selEmployee').append('<option value="' + data + '" selected>' + $('input[name=nameInside]').val() + '</option>')
        $('#mContForm').modal('hide');
      });
    });
    
  });
</script>