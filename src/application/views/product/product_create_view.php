<div class="col-md-8 frm-centrado">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Add New Product</h3>
  </div>
  <div class="panel-body">
    <form action="<?php echo $action_form; ?>" method="POST">
      <div class="form-group">
        <div class="row">
          <div class="col-md-9">
            <label for="id_category">Category</label>
            <select name="id_category" class="form-control" id="id_category" required>
              <option value="">::Select a category::</option>
              <?php 
                if (count($listcategory) > 0) {
                  foreach ($listcategory as $category) { ?>                  
                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
              <?php    }
                }
              ?>
            </select>
          </div>     
          <div class="col-md-3">
            <a href="add" id="addCategory" class="btn btn-info" style="margin-top: 26px; width: 100%; height: 39px" data-toggle="modal" data-target="#mContForm" data-backdrop="static">Add</a>
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
                <option value="<?php echo $supplier->id; ?>"><?php echo $supplier->nombres; ?></option>
          <?php    }
            }
          ?>
        </select>                                
      </div>

      <div class="form-group">
        <label for="txtName">Name</label>
        <input type="text" name="nameproduct" class="form-control" id="txtName" required maxlength="50" required>
      </div>      
      
      <div class="form-group">
        <label for="txtDescription">Description</label>
        <textarea name="description" id="txtDescription" class="form-control" rows="3" maxlength="250"></textarea>
      </div>
      
      <input type="submit" class="btn btn-primary comSeparator" value="Save">
      <a href="<?php echo site_url('product'); ?>" class="btn btn-success">Return</a>
    </form>
  </div>
</div>
</div>
<script>
  $(document).ready(function() {

    $('#addCategory').click(function(event) {
      event.preventDefault();
      $.get('<?php echo site_url('category/create'); ?>', function(data) {
        $('#mContForm').html(data);
      });
    });    

  });  
</script>