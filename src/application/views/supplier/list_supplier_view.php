<div class="panel-heading">
    <h3 class="panel-title">Registration Suppliers</h3>
</div>
<div class="panel-body">
    <table id="tableSupplier" class="table table-bordered table-hover">                  
        <thead class="texto-centrado fontB">
            <td>Name</td>
            <td>Country</td>
            <td>Telephone</td>
            <td>Status</td>
            <td>Actión</td>
        </thead>
        <?php
        if (count($list_supplier) > 0) {    
            foreach ($list_supplier as $supplier) { ?>
                <tr>
                    <td><?php echo $supplier->nombres; ?></td>
                    <td><?php echo $supplier->pais; ?></td>            
                    <td><?php echo $supplier->telefono; ?></td>            
                    <td style="text-align: center;"><?php echo $supplier->estado; ?></td>            
                    <td style="text-align: center;"><button class="btn btn-info bsmall bEdit" data-toggle="modal" data-target="#mContForm" data-id="<?php echo $supplier->id; ?>" data-backdrop="static"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button><button tabindex="0" class="btn btn-danger bsmall" role="button" data-toggle="popover" data-trigger="focus" data-placement="left" title="¿ Confirmar Eliminación ?" data-content='<button class="btn btn-primary bconfirmar">No</button><a class="btn btn-danger bconfirmar" href="<?php echo site_url("supplier/delete/" . $supplier->id); ?>">Si</a>' ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></button></td>
                </tr>                       
        <?php }
        }
        ?>
        <tfoot>
            <tr class="texto-centrado">
                <td colspan="5"><a class="btn btn-info bxl" href="<?php echo site_url('supplier/create'); ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Add</a>            
            </tr>
        </tfoot>
    </table>
</div>
<?php if ($this->session->flashdata('delete') > 0) { ?>
    <div id="oAlert" class="alert alert-success alert-dismissible alert-fijo" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Information!</strong> Suppliers removed properly.
    </div>
    <script>
        $(document).ready(function() {
            function close_alert() {
                $('#oAlert').alert('close');
            }            
            window.setTimeout(close_alert, 2000);
        });
    </script>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function() {               
        $('#bAbrirVenMod').click(function(event) {
            event.preventDefault();
            $('#mContForm2').load('<?php echo site_url("supplier/create"); ?>');        
        }); 

        $('[data-toggle="popover"]').popover({ html : true });  

        $('.bEdit').click(function(event) {
            event.preventDefault();
            var nId = $(this).data('id');       
            $('#mContForm').html('');       
            $.get('<?php echo site_url("supplier/edit"); ?>', { id: nId }, function(data) {
                $('#mContForm').html(data);
            });
        });
    });
</script>
