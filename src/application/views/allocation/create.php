<?php //var_dump($this->loginData); ?>
<div class="col-md-10 frm-centrado ">
    <div class="row bg-color-gray">
        <form action="<?php echo base_url('buyer/create') ?>" method="POST" role="form">
            <div>
                <input name="anio" type="hidden" size="25"  value="<?php $anio ?>"readonly="yes">
                <input type="hidden" id="vista" name="vista" value="0">
            </div>


            <div class="col-md-3">
                <div class="form-group form-group-black">
                    <label for="dates">Date</label>
                    <input type="text" class="form-control" id="dates">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-group-black">
                    <label for="po_number">P/O Number :</label>
                    <input type="text"  class="form-control" id="po_number">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-group-black">
                    <label for="id_cli">Buyer:</label>
                    <select name="id_cli" class="form-control col-md-6 bg-color-gray" id="id_cli">
                        <option>--------- Selected ---------</option>
                        <?php if (count($clientes) > 0): ?>
                            <?php foreach ($clientes as $key => $value): ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">no found</option>
                        <?php endif; ?>
                    </select>
                    
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-group-black">
                    <label for="id_cli">&nbsp;</label>
                    <input type="boton" name="Submit243" class="form-control btn btn-primary col-md-6" 
                        onclick="javascript:loadForm(this)" value="Add Buyer" data-url-id="1">
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
                <input class="btn btn-primary" type="button" onclick="showProveedor(this)" value="Add" />
            </div>
            <div class="col-sm-6 text-left">
                <input class="btn btn-primary" name="Submit2432" type="button" onclick="location.href = '<?php echo site_url('/allocation/index?anio=' . $anio) ?>';" value="Return">
            </div>
        </div>
    </div>

    <div class="row"><hr></div>

    <div class="row red">

        <form class="form-horizontal" role="form" id="formProveedor" name="formProveedor" style="display: none">
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
                <label for="id_proveedor" class="col-lg-2 control-label">Supplier</label>
                <div class="col-lg-10 nopadding_">
                    <div class="row">
                        <div class="col-sm-5">
                            <select name="id_proveedor" id="id_proveedor" class="form-control col-lg-5" onchange="onSupplier()">
                                <?php if (count($empleados) > 0): ?>
                                    <option value="">-</option>
                                <?php foreach ($empleados as $key => $value): ?>
                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nombres'] ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option>no records.</option>
                                <?php endif;?>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <input type="button" name="Submit242"  class="btn btn-primary" onclick="javascript:loadForm(this)" value="New"
                                   data-url-id="2">
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
                        <select name="id_producto" id="id_producto" class="form-control col-lg-5"  >
                            <option value="">-</option>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <input type="button" name="Submit242"  class="btn btn-primary" 
                               onclick="javascript:loadForm(this, {id_proveedor: document.getElementById('id_proveedor').value})" value="New"
                            data-url-id="3">
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
                                <option value="">-</option>
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
                <div class="col-md-10 nopadding">                        
                    <div class="col-md-3">
                        <select name="partner_comision" id="partner_comision" class="form-control col-lg-5"   
                                onChange="showItemInputsComision(this);">
                              <option value="">-</option>
                              <option value="1">Cantidad</option>
                              <option value="3">Cantidad 2</option>
                              <option value="4">Cantidad3</option>
                              <option value="5">Monto</option>
                              <option value="2">Porcentaje</option>
                        </select>
                    </div>
                    <div class="col-sm-8">
                        <div>
                            <ul id="comision-extra">
                                <li class="comision-1"><!-- cantidad -->
                                    <span>
                                    = Qty *<input name="cant1" type="text" id="cant1" value="" size="5">
                                    </span>
                                </li>
                                <li class="comision-2"><!-- cantidad 2 -->
                                    <span>
                                        = Q'ty *
                                        <label>
                                        <input name="cant2" type="text" id="cant2" value="" size="5">
                                        + Q'ty *
                                        <input name="cant3" type="text" class="Estilo43" id="cant3" value="" size="24">
                                        </label>
                                    </span>
                                </li>
                                <li class="comision-3"><!-- cantidad 3 -->
                                    <span>
                                        = Q'ty *
                                        <input name="cant4" type="text" id="cant4" value="" size="5">
                                        + Q'ty *
                                        <input name="cant5" type="text" id="cant5" value="" size="5">
                                        + Q'ty *                          
                                        <input name="cant6" type="text" id="cant6" value="" size="5">
                                    </span>
                                </li>
                                <li class="comision-4"><!-- monto -->
                                    <span>
                                    = Monto
                                    <input name="cant7" type="text" id="cant7" value="" size="5">
                                    </span>
                                </li>
                                <li  class="comision-4"><!-- Amount -->
                                    <span>
                                    = Amount *
                                    <label>
                                    <input name="porc1" type="text" id="porc1" value="" size="5">%
                                    </label></span>
                                </li>
                            </ul>
                                                      
                        </div>
                        
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
                                <option value="">-</option>
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
                <div class="col-md-10 nopadding">                        
                    <div class="col-md-3">
                        <select name="insid" class="form-control col-md-5" id="insid" onchange="showItemInputsInsideComision();">
                              <option value="">-</option>
                              <option value="2">Cantidad</option>
                              <option value="3">Monto</option>
                              <option value="1">Porcentaje</option>
                            </select>
                        
                    </div>
                    <div class="col-md-7">
                        <ul id="inside-comision-extra">
                            <li>
                                <span>= Q'ty *
                                <input name="cant16" type="text" value="" size="5">
                                </span>
                            </li>
                            <li>
                                <span>= Monto
                                <input name="cant8" type="text" id="cant8" value="" size="5">
                                </span>
                            </li>
                            <li>
                                <span>= Income *
                                <label>
                                <input name="porc3" type="text" id="porc3" value="" size="5"> %
                                </label>
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div>
                </div>
            </div>
            </div>
            
            <!--  Income US$ -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">Income US$</label>
                <div class="col-lg-10 nopadding">                        
                    <div class="col-md-3">
                        <select name="incom" id="incom" class="form-control col-lg-5"   onChange="showItemInputsInsideUsComision();">
                            <option value="">-</option>
                            <option value="1">Cantidad</option>
                            <option value="3">Cantidad 2</option>
                            <option value="4">Cantidad3</option>
                            <option value="5">Monto</option>
                            <option value="2">Porcentaje</option>
                        </select>
                    </div>
                    <div class="col-md-7">
                        <ul id="insideus-comision-extra">
                            <li>
                                <span>
                                = Qty *
                                <label>
                                <input name="cant9" type="text" id="cant9" value="" size="5">
                                </label>
                                </span>
                            </li>
                            <li>
                                <span class="">
                                = Q'ty *
                                <label>
                                <input name="cant10" type="text" id="cant10" value="" size="5">
                                + Q'ty *
                                <input name="cant11" type="text" id="cant11" value="" size="5">
                                </label>
                                </span>
                            </li>
                            <li>
                                <span class="">
                                = Q'ty *
                                <input name="cant12" type="text" id="cant12" value="" size="5">
                                + Q'ty *
                                <input name="cant13" type="text" id="cant13" value="" size="5">
                                + Q'ty *
                                <input name="cant14" type="text" id="cant14" value="" size="5">
                                </span>
                            </li>
                            <li>
                                <span class="">
                                = Monto
                                <input name="cant15" type="text" id="cant15" value="" size="5">
                                </span>
                            </li>
                            <li>
                                <span class="">
                                = Amount *
                                <label>
                                <input name="porc2" type="text" id="porc2" value="" size="5"> %
                                </label>
                                </span>
                            </li>

                        </ul>
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
                            <?php if (count($incoterms) > 0): ?>
                                <option value="">-</option>
                            <?php foreach ($incoterms as $key => $value): ?>
                                <option value="<?php echo $key ?>"><?php echo $value['nombre']?></option>
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
            
            <!-- Payment Terms -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">Payment Terms</label>
                <div class="col-lg-10 nopadding">                        
                    <div class="col-sm-5">
                        <select name="partner" id="partner" class="form-control col-lg-5" onChange="ver();">
                            <?php if (count($payments) > 0): ?>
                                <option value="">-</option>
                            <?php foreach ($payments as $key => $value): ?>
                                <option value="<?php echo $key ?>"><?php echo $value['payment'] ?></option>
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
            
            <!-- ETD -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">ETD</label>
                <div class="col-sm-3">                        
                    <input type="text" name="etd" id="etd" class="form-control"/>
                </div>
            </div>
            
            <!-- ETA -->
            <div class="form-group">
                <label for="qty" class="col-lg-2 control-label">ETA</label>
                <div class="col-sm-3">                        
                    <input type="text" name="eta" id="eta" class="form-control"/>
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
</div>

<script type="text/javascript">
    function showProveedor(dom) {
        dom.parentElement
            .parentElement
            .parentElement
            .style.display = 'none';

        document.formProveedor.style.display = 'block';
    }
    
    function onSupplier() {
        var id_proveedor = $('#id_proveedor').val();
        $.ajax({
                type: "GET",
                url: "<?php echo site_url('/allocation/json_producto_por_proveedor') ?>",
                data: { 'id_proveedor': id_proveedor},
                success: function(data){
                    console.log(data)
                    var select = $('#id_producto').empty();
                    $.each(data, function(i,item) {
                        select.append( '<option value="'
                                             + item.id
                                             + '">'
                                             + item.name
                                             + '</option>' );
                    });
                }
            });
           
    }
    
    function showItemInputsComision(dom) {
        var e = document.getElementById("partner_comision") ;
        var strUser = e.options[e.selectedIndex].value;
        $( "#comision-extra li" ).css('display', 'none');
        if (strUser == 1) {
            $( "#comision-extra li:nth-child(1)" ).css('display', 'block')
        } else if(strUser == 2) {
             $( "#comision-extra li:nth-child(2)" ).css('display', 'block')
        } else if (strUser == 3) {
            $( "#comision-extra li:nth-child(3)" ).css('display', 'block')
        } else if (strUser == 4) {
            $( "#comision-extra li:nth-child(4)" ).css('display', 'block')
        }else if(strUser == 5){
            $( "#comision-extra li:nth-child(5)" ).css('display', 'block')
        }else if(strUser == 6){
            $( "#comision-extra li:nth-child(6)" ).css('display', 'block')
        }
        
    }
    
    function showItemInputsInsideComision(dom) {
        var e = document.getElementById("insid") ;
        var strUser = e.options[e.selectedIndex].value;
        $( "#inside-comision-extra li" ).css('display', 'none');
        if (strUser == 2) {
            $( "#inside-comision-extra li:nth-child(1)" ).css('display', 'block')
        } else if(strUser == 3) {
             $( "#inside-comision-extra li:nth-child(2)" ).css('display', 'block')
        } else if (strUser == 1) {
            $( "#inside-comision-extra li:nth-child(3)" ).css('display', 'block')
        }         
    }
    
    function showItemInputsInsideUsComision(dom) {
        var e = document.getElementById("incom") ;
        var strUser = e.options[e.selectedIndex].value;
        
        $( "#insideus-comision-extra li" ).css('display', 'none');
        if (strUser == 1) {
            $( "#insideus-comision-extra li:nth-child(1)" ).css('display', 'block')
        } else if(strUser == 3) {
             $( "#insideus-comision-extra li:nth-child(2)" ).css('display', 'block')
        } else if (strUser == 4) {
            $( "#insideus-comision-extra li:nth-child(3)" ).css('display', 'block')
        } else if (strUser == 5) {
            $( "#insideus-comision-extra li:nth-child(4)" ).css('display', 'block')
        } else if (strUser == 2) {
            $( "#insideus-comision-extra li:nth-child(5)" ).css('display', 'block')
        }      
    }

    $(document).ready(function(){
       


    });
    
    /**
    * 

     * @param {type} dom
     * @param {type} extraData only object
     * @returns {undefined}     */
    function loadForm(dom, extraData) {
        var url = '<?php echo site_url('allocation/modal_general') ?>';
        var id = dom.getAttribute('data-url-id'); 
       
       var dataPost = {};
        if (typeof(extraData) !== 'undefined'){
            dataPost = extraData;
        }
        dataPost.id = id;
        $.post(url, dataPost)
          .done(function( data ) {
            $('#content-modals').html(data);
        });
        
    }
    
</script>

<?php require_once 'modal/modal.php' ?>
