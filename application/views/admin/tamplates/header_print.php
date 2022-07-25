</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url();?>assets/img/logo asli.png">
	<title><?= $judul; ?></title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/print_style.css">
</head>
<body>
<script>
    window.print();
</script>
<?php if(isset($bulan) && isset($tahun)): ?>
    <h2><?= $judul." ".$bulan; ?></h2>
<?php endif; ?>
<h2><?= $judul; ?></h2>
	<table cellspacing='1' cellpadding="2">
