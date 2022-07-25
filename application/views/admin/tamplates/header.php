<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url(); ?>assets/img/logo asli.png">
    <title><?= $judul; ?></title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/testk.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li class="brand">
                    <a href="#">
                        <span class="icon"><img src="<?= base_url(); ?>assets/img/logo asli.png" alt="" srcset=""></span>
                        <span class="title">
                            <h4>Perpustakaan<br> SMA 1 Keruak</h4>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>Admin">
                        <span class="icon"><i class="fas fa-fw fa-home"></i></span>
                        <span class="title">
                            Dasboard
                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>Anggota">
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <span class="title">
                            Anggota
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon dropdown-btn-buku"><i class="fas fa-book"></i></i></span>
                        <span class="title">
                            Buku
                        </span>
                        <div class="dropdown-buku">
                            <a href="<?= base_url(); ?>Admin_buku">
                                <span class="title">
                                    Buku
                                </span>
                            </a>
                            <a href="<?= base_url(); ?>Admin_buku/kategori">
                                <span class="title">
                                    Ketegori
                                </span>
                            </a>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon dropdown-btn-pinjam"><i class="fas fa-hands-helping"></i></span>
                        <span class="title">
                            Pinjam
                        </span>

                        <div class="dropdown-pinjam">
                            <a href="<?= base_url(); ?>Transaksi_pinjam">
                                <span class="title">
                                    Transaksi Pinjam
                                </span>
                            </a>
                            <a href="<?= base_url(); ?>Buku_dipinjam">
                                <span class="title">
                                    Table Buku Yang Dipinjam
                                </span>
                            </a>
                            <a href="<?= base_url(); ?>Buku_dikembalikan">
                                <span class="title">
                                    Buku Yang Dikembalikan
                                </span>
                            </a>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>Laporan">
                        <span class="icon"><i class="far fa-fw fa-file"></i></span>
                        <span class="title">
                            Laporan
                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>admin_informasi">
                        <span class="icon"><i class="fas fa-info-circle"></i></span>
                        <span class="title">
                            Membuat Informasi
                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Pengaturan'); ?>">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="title">
                            Pengaturan
                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Login/logout') ?>" class="logout">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="title">
                            Log Out
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <div class="topbar">
                <div class="toggle"><i class="fas fa-bars"></i></div>
                <div class="user">
                    <img src="<?= base_url(); ?>assets/img/<?= $this->session->userdata('gambar'); ?>" width="100">
                </div>
            </div>