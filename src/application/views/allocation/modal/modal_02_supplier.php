<!-- MODAL 01 -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Suppliers</h4>
            </div>
            <form id="form-buyer" name="form-buyer" method="POST" 
                  action="<?php echo base_url('buyer/create') ?>">
                <input type="hidden" name="request" value="1" />

                <div class="modal-body">      

                    <div class="table-responsive" style="height: 450px; padding: 0 15px 0 0;">
                        <!--inicio-->                    
                        <div class="form-group">
                            <label for="txtName">Name</label>
                            <input type="text" name="nombres" class="form-control" id="txtName" required maxlength="25" autofocus>
                        </div>      
                        <div class="form-group">
                            <label for="txtTelephone">Telephone</label>
                            <input type="text" name="telefono" class="form-control" id="txtNTelephone" maxlength="15">
                        </div>
                        <div class="form-group">
                            <label for="txtCellular">Celular</label>
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
                                            foreach ($list_country as $country) {
                                                ?>                  
                                                <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                                                <?php
                                            }
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

                        <input type="hidden" name="credito" value="0">
                        <input type="hidden" name="estado" value="a">
                        <input type="submit" class="btn btn-primary comSeparator" value="Save">
                        <button class="btn btn-success" data-dismiss="modal">Return</button>
                        <!--fin-->
                    </div>  
                </div>
            </form>            
        </div>
    </div>
</div>

<!-- MODAL 02 -->
<div class="modal fade in" id="myModal2" role="dialog" aria-hidden="false">
    <!-- Modal Personalizado -->
    <div class="porModal" style="display: block;">
        <div class="cont-modalP">
            <div class="modalPTitulo">
                <p>Add New Country</p>        
            </div>
            <form id="frmAddCountry" action="<?php echo base_url('buyer/create') ?>" method="post" accept-charset="utf-8">
                <div class="modalPCuerpo">                
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control required" id="name" name="name">
                    </div>
                    <div class="table-responsive" style="height: 280px; padding: 0 15px 0 0;">
                        <table id="tableCountry" class="table table-condensed table-bordered table-hover table-fondo">                  
                            <thead class="texto-centrado fontB">
                                <tr><td>Name</td>                      
                                    <td>Actión</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($list_country) > 0): ?>
                                    <?php foreach ($list_country as $country): ?>
                                        <tr>
                                            <td><?php echo $country->name ?></td>
                                            <td>
                                                <a href="delete" class="btn btn-danger del-Country" data-id="<?php echo $country->id; ?>">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td>no found</td>
                                        <td>-</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>          
                <div class="modalPPie">          
                    <input type="submit" class="btn btn-primary" value="Save">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Return</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Mensaje de Confirmacion -->
<div class="cont-mensaje-modal cont-mensaje-1">
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#myModal').modal('show');

    });
</script>

