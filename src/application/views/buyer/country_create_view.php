<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Add New Country</h4>
    </div>
    <form id="frmCountry" method="POST" action="<?php echo site_url('supplier/country_create'); ?>">
    <div class="modal-body">      
        <div class="form-group">
          <label for="txtName">Name</label>
          <input type="text" name="name" class="form-control" id="txtName" maxlength="20">
        </div>              
    </div>
    <div class="modal-footer">            
      <input type="submit" class="btn btn-primary comSeparator" value="Save">
      <a href="<?php echo site_url('buyer'); ?>" class="btn btn-default" data-dismiss="modal">Return</a>
    </div>
    </form>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#frmCountry').submit(function(event) {
      event.preventDefault();         
      $.post('<?php echo site_url("buyer/country_create"); ?>', {name : $('input[name=name]').val()}, function(data) {
        $('#sltCountry').append('<option value="' + data + '" selected>' + $('input[name=name]').val() + '</option>');
        $('#mContForm').modal('hide');
      });
    });
  });
</script>