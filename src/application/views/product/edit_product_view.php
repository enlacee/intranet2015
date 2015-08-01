<!-- Mensaje de Confirmacion para eliminar Cat -->
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
<!-- Fin Mensaje de Confirmacion para eliminar Cat -->
<!-- Modal Personalizado -->
<div class="porModal">
  <div class="cont-modalP" style="margin-top: 10px;">
    <div class="modalPTitulo">
      <p>Add New Cat</p>        
    </div>
    <form id="frmAddCategory" action="<?php echo site_url('category/create'); ?>" method="post" accept-charset="utf-8">
      <div class="modalPCuerpo">                
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
          <table id="tableCategory" class="table table-bordered table-hover table-fondo">                  
            <thead class="texto-centrado fontB">
              <td>Name</td>  
              <td>Type</td>
              <td>Status</td>
              <td>Actión</td>
            </thead>
            <?php
            if (count($listcatmodal) > 0) {    
                foreach ($listcatmodal as $category) { ?>
                    <tr>
                        <td><?php echo $category->name; ?></td>
                        <td><?php echo $category->type; ?></td>
                        <td><?php echo $category->status; ?></td>
                        <td style="text-align: center;"><a href="delete" class="btn btn-danger del-Cat" data-id="<?php echo $category->id; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
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
      <h4 class="modal-title" id="myModalLabel">Modify Product</h4>
    </div>
    <form method="POST" action="<?php echo site_url('product/edit'); ?>">
      <div class="modal-body">  
        <div class="form-group">
          <div class="row">
            <div class="col-md-9">
              <label for="id_category">Category</label>
              <select name="id_category" class="form-control" id="id_category" required>
                <option value="">::Select a category::</option>
                <?php 
                  if (count($listcategory) > 0) {
                    foreach ($listcategory as $category) { ?>                  
                      <option value="<?php echo $category->id; ?>" <?php if ($product->id_category == $category->id) {echo "selected";} ?>><?php echo $category->name; ?></option>
                <?php    }
                  }
                ?>
              </select>
            </div>     
            <div class="col-md-3">
              <a href="add" id="addCategory" class="btn btn-info" style="margin-top: 26px; width: 100%; height: 39px">Add</a>
            </div>     
          </div>
        </div>

        <div class="form-group">                  
          <label for="id_supplier">Supplier</label>
          <select name="id_supplier" class="form-control" id="id_supplier" required>
            <option value="">::Select a supplier::</option>
            <?php 
              if (count($listsupplier) > 0) {
                foreach ($listsupplier as $supplier) { ?>                  
                  <option value="<?php echo $supplier->id; ?>" <?php if ($product->id_supplier == $supplier->id) {echo "selected";} ?>><?php echo $supplier->nombres; ?></option>
            <?php    }
              }
            ?>
          </select>                                
        </div>

        <div class="form-group">
          <label for="txtName">Name</label>
          <input type="text" name="nameproduct" class="form-control" id="txtName" required maxlength="50" value="<?php echo $product->name; ?>" required>
        </div>      
        
        <div class="form-group">
          <label for="txtDescription">Description</label>
          <textarea name="description" id="txtDescription" class="form-control" rows="3" maxlength="250"><?php echo $product->description; ?></textarea>
        </div>    
                      
      </div>
    <div class="modal-footer">      
      <input type="hidden" name="id" value="<?php echo $product->id; ?>">          
      <input type="submit" class="btn btn-primary comSeparator" value="Save">
      <button class="btn btn-default" data-dismiss="modal">Return</button>
    </div>
    </form>
  </div>
</div>
<script>
  $(document).ready(function() { 

    $('#addCategory').click(function(event) {
        event.preventDefault();
        $('input[name=namecategory]').val('');
        $('input[name=typecategory]').val('');
        $('input[name=statuscategory]').val('');        
        $('div.porModal').fadeIn('500');        
        $('input[name=namecategory]').focus();
    });

    $('#frmAddCategory').submit(function(event) {            
      event.preventDefault();
      if ( $.trim($('input[name=namecategory]').val()) == '' ) {
        $('input[name=namecategory]').focus();
      } else{
        $.post('<?php echo site_url("category/create"); ?>', {name : $('input[name=namecategory]').val(), type : $('input[name=typecategory]').val(), status : $('input[name=statuscategory]').val()}, function(data) {
          $('#id_category').append('<option value="' + data + '" selected>' + $('input[name=namecategory]').val() + '</option>');                    
          cFila = "<tr><td>" + $('input[name=namecategory]').val() + "</td>";
          cFila += "<td>" + $('input[name=typecategory]').val() + "</td>";
          cFila += "<td>" + $('input[name=statuscategory]').val() + "</td>";
          cFila += '<td style="text-align: center;"><a href="delete" class="btn btn-danger del-Cat" data-id="' + data + '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
          $('#tableCategory tr:last').after(cFila);
          $('div.porModal').fadeOut('500');  
        });        
      };     
    });

    $('#bCerrarMS').click(function(event) {
      event.preventDefault();
      $('div.porModal').fadeOut('500');
    });

    // Mensaje de confirmacion
    var idCat = 0;
    var nFila = 0;    

    $('#tableCategory').on('click', 'a.del-Cat', function(event) {
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
          $('#tableCategory tbody tr:eq(' + nFila + ')').remove();          
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