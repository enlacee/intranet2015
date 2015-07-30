<div class="col-md-8 frm-centrado">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Add New Buyer</h3>
  </div>
  <div class="panel-body">
    <form action="<?php echo $action_form; ?>" method="POST">
      <div class="form-group">
        <label for="txtName">Name</label>
        <input type="text" name="namebuyer" class="form-control" id="txtName" required maxlength="25" autofocus>
      </div>      
      <div class="form-group">
        <label for="txtRuc">RUC</label>
        <input type="text" name="ruc" class="form-control" id="txtRuc" maxlength="50">
      </div>
      <div class="form-group">
        <label for="txtAddress">Address</label>
        <input type="text" name="address" class="form-control" id="txtAddress" maxlength="50">
      </div>
      <div class="form-group">
        <label for="txtWeb">Web</label>
        <input type="text" name="web" class="form-control" id="txtWeb" maxlength="100">
      </div>
      <div class="form-group">
        <label for="txtFax">Fax</label>
        <input type="text" name="fax" class="form-control" id="txtFax" maxlength="15">
      </div>
      <div class="form-group">
        <label for="txtTelephone">Telephone</label>
        <input type="text" name="telephone" class="form-control" id="txtTelephone" maxlength="15">
      </div>      
      <div class="form-group">
        <div class="row">
          <div class="col-md-9">
            <label for="selCountry">Country</label>
            <select name="country" class="form-control" id="sltCountry" required>
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
            <a href="#" id="addCountry" class="btn btn-info" style="margin-top: 26px; width: 100%;" data-toggle="modal" data-target="#mContForm" data-backdrop="static">Add</a>
          </div>     
        </div>
      </div>      
      <div class="form-group">
        <label for="txtEmail">E-Mail</label>
        <input type="email" name="email" class="form-control" id="txtEmail" maxlength="50">
      </div>
      <div class="form-group">
        <label for="txtObs">Description</label>
        <textarea name="description" id="txtObs" class="form-control" rows="3" maxlength="250"></textarea>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-6">
            <label for="txtCred1">Credit line 1</label>
            <input type="text" name="cred_1" class="form-control" id="txtCred1">
          </div>
          <div class="col-md-6">            
            <select name="supplier1" class="form-control" style="margin-top: 26px;" required>
              <option value="0">::Select a supplier::</option>
              <?php 
                if (count($listcredit) > 0) {
                  foreach ($listcredit as $credit) { ?>                  
                    <option value="<?php echo $credit->id; ?>"><?php echo $credit->nombres; ?></option>
              <?php    }
                }
              ?>
            </select>
          </div>                   
        </div>
      </div>     
      <div class="form-group">
        <div class="row">
          <div class="col-md-6">
            <label for="txtCred2">Credit line 2</label>
            <input type="text" name="cred_2" class="form-control" id="txtCred2">
          </div>
          <div class="col-md-6">            
            <select name="supplier2" class="form-control" style="margin-top: 26px;" required>
              <option value="0">::Select a supplier::</option>
              <?php 
                if (count($listcredit) > 0) {
                  foreach ($listcredit as $credit) { ?>                  
                    <option value="<?php echo $credit->id; ?>"><?php echo $credit->nombres; ?></option>
              <?php    }
                }
              ?>
            </select>
          </div>                   
        </div>
      </div> 
      <input type="submit" class="btn btn-primary comSeparator" value="Save">
      <a href="<?php echo site_url('buyer'); ?>" class="btn btn-success">Return</a>
    </form>
  </div>
</div>
</div>
<script>
  $(document).ready(function() {

    $('#addCountry').click(function(event) {
      event.preventDefault();
      $.get('<?php echo site_url("country/create"); ?>', function(data) {
        $('#mContForm').html(data);
      })
    });

    $('form').submit(function(event) {
      if ($('#sltCountry').val() == 0) {
        event.preventDefault();
      }
    });

    $('#txtCred1').number(true, 2);
    $('#txtCred2').number(true, 2);

  });  
</script>