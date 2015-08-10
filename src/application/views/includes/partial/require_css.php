<!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/cssespecial.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/datepicker.css">
<?php if (isset($css)): ?>
    <?php foreach ($css as $key => $value): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() . $value; ?>" >
    <?php endforeach; ?>
<?php endif; ?>      