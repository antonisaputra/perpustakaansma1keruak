<div class="table">
    <div class="card-table">
        <div class="cardHeader">
            <h2>Tambah Informasi Perpustakaan</h2>
        </div>

        <div class="form-informasi">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?= $informasi['id']; ?>">
                <input type="hidden" name="gambar_dahulu" value="<?= $informasi['gambar']; ?>">
                <label for="judul">Judul Infomasi</label><br>
                <input type="text" name="judul" id="judul" value="<?= $informasi['judul']; ?>"><br>
                <label for="waktu_pembuatan">Waktu Pembuatan</label><br>
                <input type="date" name="waktu_pembuatan" id="waktu_pembuatan" value="<?= $informasi['waktu_pembuatan']; ?>"><br>
                <label for="gambar">Gambar Informasi</label><br>
                <img src="<?= base_url(); ?>assets/img/<?= $informasi['gambar']; ?>" width="80">
                <input type="file" name="gambar" id="gambar"><br>
                <label for="informasi_singkat">Informasi Untuk Halaman Beranda</label><br>
                <textarea name="informasi_singkat" id="informasi_singkat" cols="30" rows="10"><?= $informasi['informasi_singkat']; ?></textarea><br>
                <label for="informasi_detail">Informasi Detail</label><br>
                <textarea name="informasi_detail" id="informasi_detail" cols="30" rows="10"><?= $informasi['informasi_detail']; ?></textarea><br>
                <a href="<?= base_url(); ?>Admin_informasi">Kembali</a>
                <button type="submit" value="Cari" name="cari_buku">Simpan</button>
            </form>
        </div>

    </div>
</div>

<script>
    document.getElementById("informasi_singkat").value = "<?= $informasi['informasi_singkat']; ?>";
</script>