<?php //var_dump($this->loginData); ?>
<div class="col-md-10 frm-centrado ">
    <div class="row bg-color-gray">
        <form role="form">
            <div>
                <input name="anio" type="hidden" size="25"  value="<?php $anio ?>"readonly="yes">
                <input type="hidden" id="vista" name="vista" value="0">
            </div>


            <div class="col-md-4">
                <div class="form-group form-group-black">
                    <label for="dates">Date</label>
                    <input type="text" class="form-control" id="dates">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group form-group-black">
                    <label for="po_number">P/O Number :</label>
                    <input type="text" class="form-control" id="po_number">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group form-group-black">
                    <label for="id_cli">Buyer:</label>
                    <select name="id_cli" class="form-control col-lg-5 bg-color-gray" id="id_cli">
                        <option>--------- Selected ---------</option>
                        <?php if (count($clientes) > 0): ?>
                            <?php foreach ($clientes as $key => $value): ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <input type="boton" name="Submit243" class="form-control btn btn-primary Estilo43" onclick="javascript:browse2()" value="Add  Buyer">
                </div>
            </div>
        </form>
    </div>
    <div class="row"><hr></div>
    <!-- title suppliers -->
    <div class="row red">
        <div>
            <div class="col-md-3" style="background-color: #E8EFF5">
                Supplier
            </div>
            <div class="col-md-3" style="background-color: #E8EFF5">
                Products
            </div>
            <div class="col-md-3" style="background-color: #E8EFF5">
                Q'TY
            </div>
            <div class="col-md-3" style="background-color: #E8EFF5">
                (MT / UNITS)
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 text-right">
                <input class="btn btn-primary" type="button" onclick="browse('C01751')" value="Add" />
            </div>
            <div class="col-sm-6 text-left">
                <input class="btn btn-primary" name="Submit2432" type="button" onclick="location.href = '<?php echo site_url('/allocation/index?anio=' . $anio) ?>';" value="Return">
            </div>
        </div>
    </div>

    <div class="row"><hr></div>

    <div class="row red">

        <form class="form-horizontal" role="form">
            <!-- QTY -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">Q'TY (MT / UNITS):</label>
                <div class="col-lg-10 nopadding">                        
                    <div class="col-sm-5">
                        <input name="qty" type="text" id="qty" class="form-control" value="" size="24" maxlength="7">
                    </div>
                    <div class="col-sm-5 ">
                        <label class="form-group">
                            <select name="unidad" id="unidad" class="form-control col-lg-5">
                                <option value="MT">MT</option>
                                <option value="UNITS">UNITS</option>
                            </select>
                        </label>
                    </div>
                </div>
            </div>
            <!-- SUPPLIER -->
            <div class="form-group">
                <label for="id_empleado" class="col-lg-2 control-label">Supplier</label>
                <div class="col-lg-10 nopadding_">
                    <div class="row">
                        <div class="col-sm-5">
                            <select name="id_empleado" id="supplier" class="form-control col-lg-5">
                                <?php if (count($empleados) > 0): ?>
                                    <?php foreach ($empleados as $key => $value): ?>
                                    <option value="<?php echo $value['id_empleado'] ?>"><?php echo $value['nombre'] ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option>no records.</option>
                                <?php endif;?>
                                <option>-------------</option>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <input type="button" name="Submit242"  class="btn btn-primary" onclick="javascript:browse1()" value="New">
                        </div>
                    </div>

                    <div class="row red">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="col-md-4">
                                    <label for="credito" class="float-left control-label sublabel">
                                        Credit Line:
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="credito" id="credito" class="form-control" value="<?php //echo $credito;  ?>" readonly = "readonly" />
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="col-md-4">
                                    <label for="disponible" class="float-left control-label sublabel">
                                        Disponible:
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="disponible" id="disponible" class="form-control" value="<?php //echo $dispo; ?>" readonly="readonly">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Products -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">Products</label>
                <div class="col-lg-10 nopadding">                        
                    <div class="col-sm-5">
                        
                        <select name="id_producto" class="form-control col-lg-5" id="id_producto" >
                            <option value="-------------">-------------</option>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <input type="button" name="Submit242"  class="btn btn-primary" onclick="javascript:browse1()" value="New">
                    </div>

                </div>
            </div>
            
            <!-- Partner -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">Partner</label>
                <div class="col-lg-10 nopadding">                        
                    <div class="col-sm-5">
                        <select name="partner" id="partner" class="form-control col-lg-5"   onChange="ver();">
                            <?php if (count($partners) > 0): ?>
                                <?php foreach ($partners as $key => $value): ?>
                                <option value="<?php echo $value['partner'] ?>"><?php echo $value['nombre'] ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">no records.</option>
                            <?php endif;?>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <input type="button" name="Submit242"  class="btn btn-primary" onclick="javascript:browse1()" value="New">
                    </div>

                </div>
            </div>
            
            
            <!-- Partner Comm -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">Partner Comm</label>
                <div class="col-lg-10 nopadding">                        
                    <div class="col-sm-5">
                        <select name="partner" id="partner" class="form-control col-lg-5"   onChange="ver();">
                            <option value="">no records.</option>
                        </select>
                    </div>
                </div>
            </div>
            
            
            <!-- Inside Pers -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">Inside Pers</label>
                <div class="col-lg-10 nopadding">                        
                    <div class="col-sm-5">
                        <select name="partner" id="partner" class="form-control col-lg-5"   onChange="ver();">
                            <?php if (count($partners) > 0): ?>
                                <?php foreach ($partners as $key => $value): ?>
                                <option value="<?php echo $value['partner'] ?>"><?php echo $value['nombre'] ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">no records.</option>
                            <?php endif;?>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <input type="button" name="Submit242"  class="btn btn-primary" onclick="javascript:browse1()" value="New">
                    </div>
                </div>
            </div>

            <!--  Inside Comm -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">Inside Comm</label>
                <div class="col-lg-10 nopadding">                        
                    <div class="col-sm-5">
                        <select name="partner" id="partner" class="form-control col-lg-5"   onChange="ver();">
                            <option value="">no records.</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!--  Income US$ -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">Income US$</label>
                <div class="col-lg-10 nopadding">                        
                    <div class="col-sm-5">
                        <select name="partner" id="partner" class="form-control col-lg-5"   onChange="ver();">
                            <option value="">no records.</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Total Amount US$ -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">Total Amount US$</label>
                <div class="col-sm-3">                        
                    <input type="text" class="form-control"/>
                </div>
            </div>
            
            <!-- Incoterms -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">Incoterms</label>
                <div class="col-lg-10 nopadding">                        
                    <div class="col-sm-5">
                        <select name="partner" id="partner" class="form-control col-lg-5" onChange="ver();">
                            <option value="">no records.</option>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <input type="button" name="Submit242"  class="btn btn-primary" onclick="javascript:browse1()" value="New">
                    </div>
                </div>
            </div>
            
            <!-- Payment Terms -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">Payment Terms</label>
                <div class="col-lg-10 nopadding">                        
                    <div class="col-sm-5">
                        <select name="partner" id="partner" class="form-control col-lg-5" onChange="ver();">
                            <option value="">no records.</option>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <input type="button" name="Submit242"  class="btn btn-primary" onclick="javascript:browse1()" value="New">
                    </div>
                </div>
            </div>
            
            <!-- ETD -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">ETD</label>
                <div class="col-sm-3">                        
                    <input type="text" class="form-control"/>
                </div>
            </div>
            
            <!-- ETA -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">ETA</label>
                <div class="col-sm-3">                        
                    <input type="text" class="form-control"/>
                </div>
            </div>
            
            <!-- Invoice number -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">Invoice number</label>
                <div class="col-sm-3">                        
                    <input type="text" class="form-control"/>
                </div>
            </div>
            
            <!-- Remarks -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">Invoice number</label>
                <div class="col-lg-10 nopadding">                        
                    <div class="col-sm-5">
                        <textarea name="message" class="form-control required" rows="5" aria-required="true"></textarea>
                    </div>
                    <div class="col-sm-5 ">

                    </div>
                </div>
            </div>
            
            <!-- save -->
            <div class="row">
               
                <div class="col-md-6 text-right">                        
                    <input type="button" class="btn btn-primary" name="save" value="save"/>
                </div>
                <div class="col-md-6">                        
                    <input type="button" class="btn btn-primary" name="cancel" value="cancel"/>
                </div>
                
            </div>
            
            
        </form>     






    </div>



    <script>
        $(document).ready(function () {
            $('#addCountry').click(function (event) {
                event.preventDefault();
                $.get('<?php echo site_url('country/create'); ?>', function (data) {
                    $('#mContForm').html(data);
                });
            });

            $('input[name=detectchange]').change(function (event) {
                if ($(this).is(':checked')) {
                    $('input[name=credito]').val('1');
                } else {
                    $('input[name=credito]').val('0');
                }
                ;
            });
        });
    </script>