<nav>
    <div class="container">
        <div class="icons">
            <i class="fas fa-moon"></i>
            <i class="fas fa-sun"></i>
        </div>
        <div class="time">
            <div class="time-colon">
                <div class="time-text">
                    <span class="num hour_num"><?= $tanggal; ?></span>
                    <span class="text">Tanggal</span>
                </div>
                <span class="colon">:</span>
            </div>
            <div class="time-colon">
                <div class="time-text">
                    <span class="num min_num"><?= $bulan; ?></span>
                    <span class="text">Bulan</span>
                </div>
                <span class="colon">:</span>
            </div>
            <div class="time-colon">
                <div class="time-text">
                    <span class="num sec_num"><?= $tahun; ?></span>
                    <span class="text">Tahun</span>
                </div>
            </div>
        </div>
    </div>

</nav>

<div class="silinder">
    <div class="blog-slider" id="beranda">
        <div class="blog-slider__wrp swiper-wrapper">

            <?php foreach($info as $informasi): ?>

            <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                    <img src="<?= base_url(); ?>assets/img/<?= $informasi['gambar']; ?>" alt="">
                </div>
                <div class="blog-slider__content">
                    <span class="blog-slider__code"><?= date('d F Y', strtotime($informasi  ['waktu_pembuatan'])); ?></span>
                    <div class="blog-slider__title"><?= $informasi['judul']; ?></div>
                    <div class="blog-slider__text"><?= $informasi['informasi_singkat']; ?></div>
                    <a href="<?= base_url() ?>Home/detailInformasi/<?= $informasi['id']; ?>" class="blog-slider__button" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)">INFORMASI
                        SEKOLAH</a>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
        <div class="blog-slider__pagination"></div>
    </div>
</div>

<section>
    <ul>
        <li class="list active" data-filter="all"><a href="#">10 Daftar Buku Terbaru</a></li>
    </ul>
    <div class="product">
        <?php foreach ($daftarBukuTerbaru as $daftarTerbaru) : ?>
            <div class="item-box" data-item="mobile">
                <div class="img-buku">
                    <img src="<?= base_url(); ?>assets/img/<?= $daftarTerbaru['gambar_buku']; ?>">
                </div>
                <div class="middle">
                    <div class="text-img"> <a href="buku.html">Lihat</a> </div>
                </div>
                <div class="box-descripsi">
                    <a href="<?= base_url() ?>rak_buku/detail/<?= $daftarTerbaru['id']; ?>">Lihat Selengkapnya</a>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <div class="deskripsi-img">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores facere est, ex ea impedit reiciendis, illum
            doloribus corporis architecto aspernatur recusandae in. Illum eaque nihil rerum eum pariatur numquam inventore!
        </p>
    </div>
</section>