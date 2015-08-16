<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>js/number.js"></script>
<?php var_dump($js) ?> 
<?php if (isset($js)) : ?>
    <?php foreach ($js as $key => $value): ?>
<script type="text/javascript" src="<?php echo base_url() . $value; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
<?php if (isset($jstring)) : ?>
    <?php foreach ($jstring as $key => $value): ?>
        <script type="text/javascript"><?php echo $value; ?></script>
    <?php endforeach; ?>        
<?php endif; ?>