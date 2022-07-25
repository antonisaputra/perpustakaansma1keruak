<div class="wrap">
    <div class="search">
        <form action="<?= base_url(); ?>Kembalian_terlambat" method="POST">
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
            <h2>Table Buku Yang Di Denda</h2>
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
                    <td>Denda</td>
                    <td>Jumlah</td>
                </tr>
            </thead>
            <tbody>
               <?php if(empty($pinjam)):?>
                    <p>Tidak Ada Data</p>
                <?php endif; ?>
                <?php $no = 1; ?>
                <?php foreach ($pinjam as $p) : ?>
                    <?php
                    $waktuPinjam  = date_create($p['waktu_kembali']);
                    $waktuSekarang = date_create(); // waktu sekarang
                    $diff  = $waktuPinjam->diff($waktuSekarang);
                    $waktuPinjamStr = strtotime($p['waktu_kembali']);
                    $waktuSekarangStr = strtotime('now');
                    $denda = ($diff->days + 1) * 2000;
                    ?>
                    <?php if ($waktuSekarangStr > $waktuPinjamStr) : ?>

                        <tr>
                            <td><?= ++$start; ?></td>
                            <td><?= $p['nama_anggota']; ?></td>
                            <td><?= $p['judul_buku']; ?></td>
                            <td><?= $p['nis_nip']; ?></td>
                            <td><?= $p['waktu_pinjam']; ?></td>
                            <td><?= $p['waktu_kembali']; ?></td>
                            <td><?= 'Rp.' . number_format($denda, 2, ",", "."); ?></td>
                            <td><?= $p['jumlah_buku']; ?></td>
                        </tr>
                    <?php endif ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->pagination->create_links(); ?>
    </div>
</div>