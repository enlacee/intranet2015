<div class="col-md-10 frm-centrado ">
    <div class="row bg-color-gray">
        <form role="form">
            <div>
                <input name="anio" type="hidden" size="25"  value="<?php $anio ?>"readonly="yes">
                <input id="vista" name="vista" value="0">
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
    <div class="row">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th align="center" valign="middle" bgcolor="#E8EFF5"><span class="Estilo43">Supplier</span></th>
                    <th align="center" valign="middle" bgcolor="#E8EFF5"><span class="Estilo43">Products</span></th>
                    <th align="center" valign="middle" bgcolor="#E8EFF5"><span class="Estilo75">Q'TY</span></th>
                    <th align="center" valign="middle" bgcolor="#E8EFF5"><span class="Estilo62"> (MT / UNITS)</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    <td>john@example.com</td>
                </tr>
                <tr align="center">
                    <td colspan="4">
                        <br>
                        <div class="row">
                            <div class="col-sm-6 text-right">
                                <input class="btn btn-primary" type="button" onclick="browse('C01751')" value="Add" />
                            </div>
                            <div class="col-sm-6 text-left">
                                <input class="btn btn-primary" name="Submit2432" type="button" onclick="location.href = '<?php echo site_url('/allocation/index?anio=' . $anio) ?>';" value="Return">
                            </div>
                        </div>
                        <br>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row"><hr></div>

    <div class="row">
        <table class="table table-striped" border="1" cellpadding="0" cellspacing="0" bordercolor="#C1C4CE">
            <tbody>
                <tr>
                    <td align="center" valign="middle" bgcolor="#E8EFF5">Supplier</td>
                    <td align="center" valign="middle" bgcolor="#E8EFF5">Products</td>
                    <td align="center" valign="middle" bgcolor="#E8EFF5">Q'TY</td>
                    <td align="center" valign="middle" bgcolor="#E8EFF5">(MT / UNITS)</td>
                </tr>

                <tr>
                    <td width="155" height="28" valign="bottom" bgcolor="#FFFFFF" class="Estilo28">Q'TY (MT / UNITS):</td>
                    <td width="7" valign="bottom" bgcolor="#FFFFFF">&nbsp;</td>
                    <td width="569" valign="bottom" bgcolor="#FFFFFF"><input name="qty" type="text" class="Estilo43" id="qty" value="<?= $qty ?>" size="24" maxlength="7">
                        <label>
                            <select name="unidad" class="form-group form-group-black" id="unidad">
                                <option value="MT">MT</option>
                                <option value="UNITS">UNITS</option>
                            </select>
                        </label></td>
                </tr>
            </tbody>
        </table>

        <div class="">

            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="ejemplo_email_3" class="col-lg-2 control-label">Q'TY (MT / UNITS):</label>
                    <div class="col-lg-10 nopadding">                        
                        <div class="col-sm-5">
                            <input class="form-control" name="qty" type="text" id="qty" value="" size="24" maxlength="7">
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
                <div class="form-group">
                    <label for="ejemplo_password_3" class="col-lg-2 control-label">Contraseña</label>
                    <div class="col-lg-10">
                        <input type="password" class="form-control" id="ejemplo_password_3" 
                               placeholder="Contraseña">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> No cerrar sesión
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn btn-default">Entrar</button>
                    </div>
                </div>
            </form>     

        </div>




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