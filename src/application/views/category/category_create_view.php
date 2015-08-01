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
      <h4 class="modal-title" id="myModalLabel">Add New Category</h4>
    </div>
    <form id="frmCategory" method="POST" action="<?php echo site_url('category/create'); ?>">
    <div class="modal-body">      
        <div class="form-group">
          <label for="txtNameCat">Name</label>
          <input type="text" name="namecategory" class="form-control" id="txtNameCat" maxlength="20">
        </div>
        <div class="form-group">
          <label for="txtType">Type</label>
          <input type="text" name="typecategory" class="form-control" id="txtType" maxlength="20">
        </div>
        <div class="form-group">
          <label for="txtStatus">Status</label>
          <input type="text" name="statuscategory" class="form-control" id="txtStatus" maxlength="20">
        </div>
        <table class="table table-bordered table-hover table-fondo">                  
          <thead class="texto-centrado fontB">
            <td>Name</td>  
            <td>Type</td>
            <td>Status</td>
            <td>Actión</td>
          </thead>
          <?php
          if (count($listcategory) > 0) {    
              foreach ($listcategory as $category) { ?>
                  <tr>
                      <td><?php echo $category->name; ?></td>
                      <td><?php echo $category->type; ?></td>
                      <td><?php echo $category->status; ?></td>
                      <td style="text-align: center;"><a href="delete" class="btn btn-danger del-Country" data-id="<?php echo $category->id; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
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

    $('#frmCategory').submit(function(event) {
      if ( $.trim($('input[name=namecategory]').val()) == '' ) {
        event.preventDefault();         
        return false;
      } else {   
        event.preventDefault();  
        $.post('<?php echo site_url("category/create"); ?>', {name : $('input[name=namecategory]').val(), type : $('input[name=typecategory]').val(), status : $('input[name=statuscategory]').val()}, function(data) {
          $('#id_category').append('<option value="' + data + '" selected>' + $('input[name=namecategory]').val() + '</option>');                    
          $('#mContForm').modal('hide');
        });
      }
    });

    // Mensaje de confirmacion
    var idCat = 0;
    var nFila = 0;    

    $('table').on('click', 'a.del-Country', function(event) {
      event.preventDefault();
      idCat = $(this).data('id');
      nFila = $(this).parent().parent().index();      
      $('.cont-mensaje').fadeIn('500');
    });

    $('#delNo').click(function(event) {
      event.preventDefault();
      $('.cont-mensaje').fadeOut('500');
    });

    $('#delSi').click(function(event) {
      event.preventDefault();      
      $.post('<?php echo site_url("category/delete"); ?>', {id : idCat}, function(data) {
        if (data > 0) {          
          $('table tbody tr:eq(' + nFila + ')').remove();          
          $('#id_category option[value=' + idCat + ']').remove();
          $('.cont-mensaje').fadeOut('500');
        } else {
          $('.cont-mensaje').fadeOut('500');
        }
      });
    });
    // Fin del Mensaje de confirmación
  });
</script>