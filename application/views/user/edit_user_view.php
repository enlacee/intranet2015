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
<!-- Modal Personalizado -->
<div class="porModal">
  <div class="cont-modalP" style="margin: 20px 0;">
    <div class="modalPTitulo">
      <p>Add New Inside Pers</p>        
    </div>
    <form id="frmAddEmployee" method="post" accept-charset="utf-8">
      <div class="modalPCuerpo">                
          <div class="form-group">
            <label for="nameInside">Name</label>
            <input type="text" class="form-control" id="nameInside" name="nameInside">
          </div>                     
      </div>
      <div class="cont-table">
        <table id="tableInside" class="table table-bordered table-hover table-fondo">                  
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
    <form method="POST" action="<?php echo site_url('user/edit'); ?>">
      <div class="modal-body">              
        <div class="form-group">
          <label for="txtLogin">Login</label>
          <input type="text" name="login" class="form-control" id="txtLogin" required pattern=".{3,25}" required autocomplete="off" value="<?php echo $user->login; ?>" autofocus>
        </div>      
        <div class="form-group">
          <label for="txtPass">Password</label>
          <input type="password" name="password" class="form-control" id="txtPass" value="">
        </div>
        <div class="form-group">
          <label for="txtRepPass">Validate Password</label>
          <input type="password" name="repeatpassword" class="form-control" id="txtRepPass" value="">
        </div>
        <div class="form-group">
          <label for="txtFullName">Full Name</label>
          <input type="text" name="fullname" class="form-control" id="txtFullName" maxlength="50" required value="<?php echo $user->fullname; ?>">
        </div>
        <div class="form-group">
          <label for="txtEmail">E-Mail</label>
          <input type="email" name="email" class="form-control" id="txtEmail" maxlength="50" required value="<?php echo $user->email; ?>">
        </div>
        <div class="form-group">
          <label for="selProfile">Profile</label>
          <select name="profile" id="selProfile" class="form-control">
            <option value="0">Select a profile</option>
            <option value="1" <?php if ($user->profile == 1) { echo "selected";} ?>>Administrador</option>
            <option value="2" <?php if ($user->profile == 2) { echo "selected";} ?>>Inside</option>
            <option value="3" <?php if ($user->profile == 3) { echo "selected";} ?>>secretaria</option>
            <option value="4" <?php if ($user->profile == 4) { echo "selected";} ?>>Asistente</option>
          </select>
        </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-9">
            <label for="selEmployee">Employee</label>
            <select name="employee" class="form-control" id="selEmployee" required>
              <option value="0">Select a employee</option>
              <?php 
                if (count($listinside) > 0) {
                  if (count($listinside) > 0) {
                    foreach ($listinside as $inside) { ?> 
                      <option value="<?php echo $inside->id; ?>" <?php if ($user->employee == $inside->id) {echo "selected";} ?>><?php echo $inside->fullname; ?></option>
              <?php }                                                
                  }
                } 
              ?>
            </select>
          </div>     
          <div class="col-md-3">
            <a id="mModalSup" class="btn btn-info" style="margin-top: 26px; width: 100%;">New Employee</a>
          </div>     
          </div>
        </div>      
        <div class="form-group">
          <label for="txtEmail" style="margin: 0 10px 0 0;">Status </label>
          <label class="radio-inline">
            <input type="radio" name="status" value="1" <?php if ($user->status == 1) {echo "checked";} ?>> Active
          </label>
          <label class="radio-inline">
            <input type="radio" name="status" value="0" <?php if ($user->status == 0) {echo "checked";} ?>> Inactive
          </label>
        </div>              
      </div>
    <div class="modal-footer">      
      <input type="hidden" name="id" value="<?php echo $user->id; ?>">          
      <input type="submit" class="btn btn-primary comSeparator" value="Save">
      <a href="<?php echo site_url('user'); ?>" class="btn btn-default" data-dismiss="modal">Return</a>
    </div>
    </form>
  </div>
</div>
<script>
  $(document).ready(function() {  
    $('#mModalSup').click(function(event) {
        event.preventDefault();
        $('div.porModal').fadeIn('500');
        $('input[name=nameInside]').focus();
    });

    $('#frmAddEmployee').submit(function(event) {            
      event.preventDefault();
      if ( $.trim($('input[name=nameInside]').val()) == '' ) {
        $('input[name=nameInside]').focus();
      } else{
        $.post('<?php echo site_url("employee/create"); ?>', {fullname: $('input[name=nameInside]').val()}, function(data) {                    
          $('select[name=employee]').append('<option value="' + data + '" selected>' + $('input[name=nameInside]').val() + '</option>');
          cFila = "<tr><td>" + $('input[name=nameInside]').val() + "</td>";
          cFila += "<td>a</td>";
          cFila += '<td style="text-align: center;"><a href="delete" class="btn btn-danger del-inside" data-id="' + data + '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
          $('#tableInside tr:last').after(cFila);
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

    // Mensaje de confimacion
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
      $.post('<?php echo site_url("employee/delete"); ; ?>', { id : idInside }, function(data) {
        if (data > 0) {          
          $('#tableInside tbody tr:eq(' + nFila + ')').remove();
          $('#selEmployee option[value=' + idInside + ']').remove();
          $('.cont-mensaje').fadeOut('500');
        } else {
          $('.cont-mensaje').fadeOut('500');
        }
      });
    });
    // Fin del Mensaje de confirmación

  }); 
</script>