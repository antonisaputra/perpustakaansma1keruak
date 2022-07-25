<div class="card-detail">
                <div class="card-detail-img">
                    <img src="<?= base_url(); ?>assets/img/<?= $buku['gambar_buku']; ?>" alt="" srcset="">
                </div>
                <div class="detail">
                    <h2><?= $buku['judul']; ?></h2>
                    <p>Penulis : <?= $buku['penulis']; ?></p>
                    <p>Tahun terbit : <?= $buku['tahun_terbit']; ?></p>
                    <p>Jumlah buku : <?= $buku['jumlah_buku']; ?></p>
                    
                </div>
            </div>

            <div class="button-kembali">
                <a href="<?= base_url(); ?>Admin_buku">Kembali</a>
            </div>