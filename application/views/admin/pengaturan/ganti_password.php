<div class="gantipassword" data-gantipassword="<?= $this->session->flashdata('pesan'); ?>"></div>
<?php if ($this->session->flashdata('pesan')) {
    $this->session->flashdata('pesan');
}
?>
<div class="table">
    <div class="card-table">

        <div class="cari-nis-nip">
            <p><?= validation_errors() ?></p>

            <form action="" method="post" enctype="multipart/form-data">

                <label for="password_lama">Password Lama</label><br>
                <input type="password" name="password_lama" id="password_lama"><br>
                <label for="passwordBaru">Password Baru</label><br>
                <input type="password" name="passwordBaru" id="passwordBaru"><br>
                <label for="passwordBaru2">Konfirmasi Pasword Baru</label><br>
                <input type="password" name="passwordBaru2" id="passwordBaru2"><br>
                <a href="<?= base_url('Pengaturan'); ?>" class="btn-kembali">
                    kembali
                </a>
                <input type="submit" value="Ganti Password" name="ganti_password" style="margin-top: 20px;">
            </form>
        </div>

    </div>
</div>
</div>