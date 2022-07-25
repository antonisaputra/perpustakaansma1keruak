<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="<?= base_url(); ?>assets/img/logo asli.png">
    <title>Perpustakan SMA 1 KERUAK | <?= $judul; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- google font -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/coba10.css">
</head>


<body>
    <header>
        <div class="topnav" id="myTopnav">
            <div class="logo active"><img src="<?= base_url(); ?>assets/img/logo.png" alt=""></div>
            <a href="<?= base_url('Home'); ?>" id="link-active">Beranda</a>
            <a href="<?= base_url('Rak_buku'); ?>">Buku</a>
            <a href="<?= base_url('Daftar_pinjam'); ?>">Daftar Pinjam</a>
            <a href="<?= base_url(); ?>Kembalian_terlambat">Pengembalian Terlambat</a>
            <a href="<?= base_url(); ?>Home/visiMisi">Visi & Misi</a>
            <a href="<?= base_url(); ?>Home/profilSekolah">Profil Sekolah</a>

            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </header>