<!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/cssespecial.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/datepicker.css">
<?php if (isset($css)): ?>
    <?php foreach ($css as $key => $value): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . $value; ?>" >
    <?php endforeach; ?>
<?php endif; ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->  