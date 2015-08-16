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
            <h4 class="modal-title" id="myModalLabel">Add New Buyer</h4>
        </div>
        <form id="form" name="form" method="POST" action="">
            <div class="modal-body">      

                <div class="table-responsive" style="height: 450px; padding: 0 15px 0 0;">
                    <!--inicio-->
                    <form action_="<?php echo site_url() ?>/buyer/create" method="POST">
                        <div class="form-group">
                            <label for="txtName">Name</label>
                            <input type="text" name="namebuyer" class="form-control required" id="txtName" required="" maxlength="25" autofocus="">
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
                                    <select name="country" class="form-control" id="sltCountry" required="">
                                        <option value="">-</option>
                                        <?php if (count($list_country)>0): ?>
                                            <?php foreach ($list_country as $country): ?>
                                                <option value="<?php echo $country->id; ?>"><?php echo $country->name ?></option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                        
                                        <?php endif;?>
                                        <option value="">no found.</option>
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

                        
                        <input type="submit" class="btn btn-primary comSeparator" value="Save">
                        <a href="#" class="btn btn-success">Return</a>
                    </form>
                    <!--fin-->

                </div>  
            </div>
        </form>            
    </div>
</div>
<script>
    $(document).ready(function(){
        console.log("hi");
        $('#form').validate();

    });
</script>