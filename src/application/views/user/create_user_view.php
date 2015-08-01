<div class="col-md-8 frm-centrado">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Add New User</h3>
  </div>
  <div class="panel-body">
    <form id="addUser" action="<?php echo site_url('user/create'); ?>" method="POST">
      <div class="form-group">
        <label for="txtLogin">Login</label>
        <input type="text" name="login" class="form-control" id="txtLogin" required maxlength="25" required autocomplete="off" autofocus>
      </div>      
      <div class="form-group">
        <label for="txtPass">Password</label>
        <input type="password" name="password" class="form-control" id="txtPass" required maxlength="15" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="txtRepPass">Validate Password</label>
        <input type="password" name="repeatpassword" class="form-control" id="txtRepPass" required maxlength="15" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="txtFullName">Full Name</label>
        <input type="text" name="fullname" class="form-control" id="txtFullName" maxlength="50" required>
      </div>
      <div class="form-group">
        <label for="txtEmail">E-Mail</label>
        <input type="email" name="email" class="form-control" id="txtEmail" maxlength="50" required>
      </div>
      <div class="form-group">
        <label for="selProfile">Profile</label>
        <select name="profile" id="selProfile" class="form-control">
          <option value="0">Select a profile</option>
          <option value="1">Administrador</option>
          <option value="2">Inside</option>
          <option value="3">secretaria</option>
          <option value="4">Asistente</option>
        </select>
      </div>
      <div class="form-group">
      <div class="row">
        <div class="col-md-9">
          <label for="selEmployee">Employee</label>
          <select name="employee" class="form-control" id="selEmployee">
            <option value="0">Select a employee</option>
            <?php 
              if (count($listinside) > 0) {
                if (count($listinside) > 0) {
                  foreach ($listinside as $inside) { ?> 
                    <option value="<?php echo $inside->id; ?>"><?php echo $inside->fullname; ?></option>
            <?php }                                                
                }
              } 
            ?>
          </select>
        </div>     
        <div class="col-md-3">
          <a id="addEmployee" class="btn btn-info" href="#" style="margin-top: 26px; width: 100%;" data-toggle="modal" data-target="#mContForm" data-backdrop="static">New Employee</a>
        </div>     
        </div>
      </div>      
      <div class="form-group">
        <label for="txtEmail" style="margin: 0 10px 0 0;">Status </label>
        <label class="radio-inline">
          <input type="radio" name="status" value="1" checked> Active
        </label>
        <label class="radio-inline">
          <input type="radio" name="status" value="0"> Inactive
        </label>
      </div>
      <input type="submit" class="btn btn-primary comSeparator" value="Save">
      <a href="<?php echo site_url('user'); ?>" class="btn btn-success">Return</a>
    </form>
  </div>
</div>
</div>
<script>
  $(document).ready(function() {

    $('#addEmployee').click(function(event) {
      event.preventDefault();
      $.get('<?php echo site_url('employee/create'); ?>', function(data) {
        $('#mContForm').html(data);
      });
    });      

    $('#addUser').submit(function(event) {
      if ($('input[name=password]').val() != $('input[name=repeatpassword]').val()) {
        event.preventDefault();
        $('input[name=password]').val('');
        $('input[name=repeatpassword]').val('');
        $('input[name=password]').focus();            
      };
      if ($('#selProfile').val() == 0) {
        event.preventDefault();
        $('#selProfile').focus();        
      };
      if ($('#selEmployee').val() == 0) {
        event.preventDefault();
        $('#selEmployee').focus();        
      };
    });

  });  
</script>