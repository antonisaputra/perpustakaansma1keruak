<div class="editprofil" data-editprofil="<?= $this->session->flashdata('pesan'); ?>"></div>
<?php if ($this->session->flashdata('pesan')) {
    $this->session->flashdata('pesan');
}
?>

<div class="table">
    <div class="card-table">

        <div class="cari-nis-nip">
            <p><?= validation_errors() ?></p>

            <form action="" method="post" enctype="multipart/form-data">

                <div class="card-detail-img">
                    <img src="<?= base_url(); ?>assets/img/<?= $login['gambar'] ?>" alt="" srcset="">
                </div>
                <input type="hidden" name="id" id="id" value="<?= $login['id']; ?>">
                <input type="hidden" name="gambar_lama" id="gambar_lama" value="<?= $login['gambar']; ?>">
                <input type="file" name="gambar" id="gambar" style="margin-bottom:20px;"><br>
                <label for="nama">Nama</label><br>
                <input type="text" name="nama" id="nama" value="<?= $login['nama_admin']; ?>"><br>
                <label for="email">email</label><br>
                <input type="email" name="email" id="email" value="<?= $login['email']; ?>"><br>
                <a href="<?= base_url('Pengaturan'); ?>" class="btn-kembali">
                    kembali
                </a>
                <input type="submit" value="Edit Akun" name="editprofil" style="margin-top: 20px;">
            </form>
        </div>

    </div>
</div>
</div>