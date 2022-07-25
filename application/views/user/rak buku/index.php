<div class="wrap">
    <div class="search">
        <form action="<?= base_url(); ?>Rak_buku" method="POST">
            <input type="text" class="searchTerm" name="buku" placeholder="Cari Buku">
            <button type="submit" name="tombol_cari_buku" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
</div>
<section>
    <ul>
        <li class="list active" data-filter="all"><a href="<?= base_url(); ?>rak_buku">Semua</a></li>
        <?php foreach ($kategori as $k) : ?>
            <li class="list active" data-filter="all">
                <a href="<?= base_url('Rak_buku/kategori?filter=') . $k['kategori']; ?>"><?= $k['kategori']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="product">
        <?php foreach ($daftarBuku as $buku) : ?>
            <?php if ($buku['jumlah_buku'] > 0) : ?>
                <div class="item-box" data-item="mobile">
                    <a href="<?= base_url() ?>Rak_buku/detail/<?= $buku['id']; ?>">
                        <div class="img-buku">
                            <img src="<?= base_url(); ?>assets/img/<?= $buku['gambar_buku']; ?>">
                        </div>
                        <div class="middle">
                            <div class="text-img"> <a href="<?= base_url() ?>Rak_buku/detail/<?= $buku['id']; ?>">Lihat</a> </div>
                        </div>
                        <div class="box-descripsi">
                            <a href="<?= base_url() ?>Rak_buku/detail/<?= $buku['id']; ?>">
                                <?= $buku['judul']; ?><br>
                                Stok : <?= $buku['jumlah_buku']; ?>
                            </a>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

    </div>
</section>
<?= $this->pagination->create_links(); ?>