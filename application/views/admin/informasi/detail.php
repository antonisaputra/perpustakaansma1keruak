<div class="card-detail-info" style="margin-left: 20px; margin-top:20px;">
    <h1><?= $info['judul']; ?></h1><br>
    <div style="margin-top: -30px;">
        <p><i><?= date('d F Y', strtotime($info['waktu_pembuatan'])); ?></i></p>
    </div>
    <div class="card-detail-img" style="margin-top: 10px;">
        <img src="<?= base_url(); ?>assets/img/<?= $info['gambar']; ?>" width="80">
    </div><br>
    <div class="info_lengkap">
        <?= $info['informasi_detail']; ?>
    </div>
</div>

<div class="button-kembali" style="margin-top: 20px; border-radius: 4px;">
    <a href="<?= base_url(); ?>Admin_informasi" style="border-radius: 10px;">Kembali</a>
</div>