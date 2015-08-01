<div class="panel-heading">
    <h3 class="panel-title">User Configuration</h3>
</div>
<div class="panel-body">

<table id="tablesupplier" class="table table-bordered table-hover">                  
    <thead class="texto-centrado fontB">
        <td>Login</td>
        <td>Profile</td>            
        <td>Actión</td>
    </thead>
    <?php
    if (count($list_user) > 0) {    
        foreach ($list_user as $user) { ?>
            <tr>
                <td><?php echo $user->login; ?></td>
                <td>
                    <?php
                        switch ($user->profile) {
                            case '1':
                                echo "Administrador";
                                break;
                            case '2':
                                echo "Inside";
                                break;
                            case '3':
                                echo "Secretaria";
                                break;
                            case '4':
                                echo "Asistente";
                                break;
                            default:
                                echo "Sin Perfil";
                                break;
                        }
                    ?>
                </td>                                                    
                <td style="text-align: center;"><a class="btn btn-info bsmall bEditUser" href="<?php echo site_url("user/edit"); ?>" data-toggle="modal" data-target="#mContForm" data-id="<?php echo $user->id; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> <button tabindex="0" class="btn btn-danger bsmall" role="button" data-toggle="popover" data-trigger="focus" data-placement="left" title="¿ Confirmar Eliminación ?" data-content='<button class="btn btn-primary bconfirmar">No</button><a class="btn btn-danger bconfirmar" href="<?php echo site_url("user/delete/" . $user->id); ?>">Si</a>' ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></button></td>
            </tr>                       
    <?php }
    }
    ?>
    <tfoot>
        <tr class="texto-centrado">
            <td colspan="5"><a class="btn btn-info bxl" href="<?php echo site_url('user/create'); ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Add</a>            
        </tr>
    </tfoot>
</table>
</div>

<!--data-toggle="modal" data-target="#mContForm"-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#bAbrirVenMod').click(function(event) {
            event.preventDefault();
            $('#mContForm2').load('<?php echo site_url("user/create"); ?>');        
        }); 

        $('[data-toggle="popover"]').popover({ html : true });  

        $('.bEditUser').click(function(event) {
            event.preventDefault();
            var nId = $(this).data('id');       
            $('#mContForm').html('');       
            $.get('<?php echo site_url("user/edit"); ?>', { id: nId }, function(data) {
                $('#mContForm').html(data);
            });
        });
    });
</script>
