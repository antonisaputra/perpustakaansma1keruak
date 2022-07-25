<!doctype html>
<html lang="en-US">

<head>

    <meta charset="utf-8">
    <link rel="icon" href="<?= base_url(); ?>assets/img/logo asli.png">
    <title><?= $judul; ?></title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">

    <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>loginc.css">

</head>

<body>

    <div id="login">

        <h2><span class="fontawesome-lock"></span>Admin Perpustakaan </h2>

        <form action="" method="POST">

            <fieldset>
                <p><?= $this->session->flashdata('pesan'); ?></p>
                <p><label for="username">Username</label></p>
                <p><input type="text" id="username" name="username"></p>
                <!-- JS because of IE support; better: placeholder="mail@address.com" -->
                <?= form_error('username'); ?>

                <p><label for="password">Password</label></p>
                <p><input type="password" id="password" name="password"></p>
                <!-- JS because of IE support; better: placeholder="password" -->
                <?= form_error('password'); ?>

                <p><input type="submit" value="Login"></p>

            </fieldset>
        </form>



    </div> <!-- end login -->

</body>

</html>