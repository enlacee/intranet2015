
<div class="panel-heading">
    <h3 class="panel-title">ALLOCATIONS</h3>
    <p></p>

    <div class="row">
        <div class="col-md-5">
            <form action ="" method="GET">
                <div style="display: none">  
                    <input name="login" type="text" value="<?php echo $this->loginData->login;  ?>" />
                    <input name="id_perfil" type="text" value="<?php echo $this->loginData->id_perfil;  ?>" />
                </div>

                <div class="form-group">
                    <div class="col-md-4 ">
                        <label for="anio" class="control-label" style="color: black"><b>Select Year : </b></label>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group">
                        <select name="anio" class=" form-control col-lg-5" id="anio" onchange="this.form.submit();">
                            <option value="">Select a year </option> 
                            <?php $anioactual = date("Y"); ?>
                            <?php for ($i = $anioactual; $i >= 2000; $i--): ?>
                                <?php $selected = ($anio == $i) ? 'selected' : '' ?>
                                <option value="<?php echo $i ?>" <?php echo $selected ?>><?php echo $i ?></option> 
                            <?php endfor; ?>
                        </select> 
                        </diV>
                    </div>
                    <div class="col-md-4">
                        <input name="btnNew" type="button" class="btn btn-default" onclick="addNew(this.form, '<?php echo site_url("allocation/create") ?>')" value="&nbsp;Add&nbsp;">
                    </div>
                </div>


            </form>

        </div>
    </div>



</div>




