<div class="wrap">
    <div class="search">
        <form action="<?= base_url(); ?>Daftar_pinjam" method="POST">
            <input type="text" class="searchTerm" name="cari" placeholder="Cari Buku">
            <button type="submit" name="submit" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
</div>
<div class="table">
    <div class="card-table">
        <div class="cardHeader">
            <h2>Table Buku Yang Dipinjam</h2>
        </div>
        <table>
            <thead style="text-align:center">
                <tr>
                    <td>No</td>
                    <td>Nama Anggota</td>
                    <td>Nama Buku</td>
                    <td>Nis/Nip</td>
                    <td>Tanggal Pinjam</td>
                    <td>Tanggal Kembali</td>
                    <td>Jumalah Buku</td>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($pinjam)):?>
                    <p>Tidak Ada Data</p>
                <?php endif; ?>
                <?php $no = 1; ?>
                <?php foreach ($pinjam as $p) : ?>

                    <tr>
                        <td><?= ++$start; ?></td>
                        <td><?= $p['nama_anggota']; ?></td>
                        <td><?= $p['judul_buku']; ?></td>
                        <td><?= $p['nis_nip']; ?></td>
                        <td><?= $p['waktu_pinjam']; ?></td>
                        <td><?= $p['waktu_kembali']; ?></td>
                        <td><?= $p['jumlah_buku']; ?></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->pagination->create_links(); ?>
    </div>
</div>