<div class="col-md-8 frm-centrado">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Add New Suppliers</h3>
  </div>
  <div class="panel-body">
    <form action="<?php echo $action_form; ?>" method="POST">
      <div class="form-group">
        <label for="txtName">Name</label>
        <input type="text" name="nombres" class="form-control" id="txtName" required maxlength="25" autofocus>
      </div>      
      <div class="form-group">
        <label for="txtTelephone">Telephone</label>
        <input type="text" name="telefono" class="form-control" id="txtNTelephone" maxlength="15">
      </div>
      <div class="form-group">
        <label for="txtCellular">Cellular</label>
        <input type="text" name="celular" class="form-control" id="txtCellular" maxlength="15">
      </div>
      <div class="form-group">
        <label for="txtAddress">Address</label>
        <input type="text" name="direccion" class="form-control" id="txtAddress" maxlength="50">
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
                  <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
            <?php    }
              }
            ?>
          </select>
        </div>     
        <div class="col-md-3">
          <button id="addCountry" class="btn btn-info" style="margin-top: 26px; width: 100%; height: 39px" data-toggle="modal" data-target="#mContForm" data-backdrop="static">Add</button>
        </div>     
        </div>
      </div>
      <div class="form-group">
        <label for="txtEmail">E-Mail</label>
        <input type="email" name="email" class="form-control" id="txtEmail" maxlength="50">
      </div>
      <div class="form-group">
        <label for="txtObs">Observers</label>
        <textarea name="observaciones" id="txtObs" class="form-control" rows="3" maxlength="250"></textarea>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="detectchange"> Credit Available
        </label>
      </div>
      <input type="hidden" name="credito" value="0">
      <input type="hidden" name="estado" value="a">
      <input type="submit" class="btn btn-primary comSeparator" value="Save">
      <a href="<?php echo site_url('supplier'); ?>" class="btn btn-success">Return</a>
    </form>
  </div>
</div>
</div>
<script>
  $(document).ready(function() {
    $('#addCountry').click(function(event) {
      event.preventDefault();
      $.get('<?php echo site_url('country/create'); ?>', function(data) {
        $('#mContForm').html(data);
      });
    });

    $('input[name=detectchange]').change(function(event) {
      if ($(this).is(':checked')) {
        $('input[name=credito]').val('1');
      } else{
        $('input[name=credito]').val('0');
      };
    });
  });  
</script>