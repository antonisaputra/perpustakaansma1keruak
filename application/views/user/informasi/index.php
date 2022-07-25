<div class="informasi">
    
    <div class="informasi-lengkap">
        <h2>
            SMAN 1 Keruak Mengikuti Bimtek Menulis Berita
        </h2>
        <div class="img-informasi">
            <img src="<?= base_url();?>assets/img/<?= $informasi['gambar']; ?>" alt="" width="150">
        </div>
        <span class="blog-slider__code"><?= date('d F Y', strtotime($informasi  ['waktu_pembuatan'])); ?></span>
        <?= $informasi['informasi_detail'];?>
        <a href="<?= base_url('home'); ?>">Kembali</a>
    </div>
</div>