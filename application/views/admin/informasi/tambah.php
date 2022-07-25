<div class="table">
    <div class="card-table">
        <div class="cardHeader">
            <h2>Tambah Informasi Perpustakaan</h2>
        </div>

        <div class="form-informasi">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="judul">Judul Infomasi</label><br>
                <input type="text" name="judul" id="judul"><br>
                <label for="waktu_pembuatan">Waktu Pembuatan</label><br>
                <input type="date" name="waktu_pembuatan" id="waktu_pembuatan"><br>
                <label for="gambar">Gambar Informasi</label><br>
                <input type="file" name="gambar" id="gambar"><br>
                <label for="informasi_singkat">Informasi Untuk Halaman Beranda</label><br>
                <textarea name="informasi_singkat" id="informasi_singkat" cols="30" rows="10"></textarea><br>
                <label for="informasi_detail">Informasi Detail</label><br>
                <textarea name="informasi_detail" id="informasi_detail" cols="30" rows="10"></textarea><br>
                <a href="<?= base_url(); ?>Admin_informasi">Kembali</a>
                <button type="submit" value="Cari" name="cari_buku">Simpan</button>
            </form>
        </div>

    </div>
</div>