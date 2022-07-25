<div class="rakbuku">
        <div class="img-book">
            <img src="<?= base_url(); ?>assets/img/<?= $detailBuku['gambar_buku']; ?>" alt="">
        </div>
        <div class="descripsi-book">
            <h2 style="text-transform:capitalize;"><?= $detailBuku['judul']; ?></h2>
            <p>Penulis : <span><?= $detailBuku['penulis']; ?></span> </p>
            <p>Stok : <span><?= $detailBuku['jumlah_buku']; ?></span></p>
            <p style="text-align: center;">Silahkan Pergi Keperpustaan untuk mengambil buku dan berikan kartu perpustakaan agar diperbolohkan meminjam buku bagi yang belum memiliki katu perpustakaan silahkan mengunjungi pustakawan untuk mendaftarkan diri menjadi anggota</p>
        </div>
        
        <a href="<?= base_url();?>Rak_buku/index" >Kembali</a>
    </div>

