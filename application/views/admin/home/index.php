<div class="cardBox">
    <div class="card">
        <div>
            <div class="number"><?= $jumlahDataAnggota; ?></div>
            <div class="cardName">Anggota</div>
        </div>
        <div class="iconBox iconAnggota">
            <i class="fas fa-user"></i>
        </div>
    </div>
    <div class="card">
        <div>
            <div class="number"><?= $jumlahDataBuku; ?></div>
            <div class="cardName">Buku</div>
        </div>
        <div class="iconBox iconBuku">
            <i class="fas fa-book"></i>
        </div>
    </div>
    <div class="card">
        <div>
            <div class="number"><?= $jumlahDataPinjam; ?></div>
            <div class="cardName">Buku Yang Belum Dikembalikan</div>
        </div>
        <div class="iconBox iconBukuBelumKembali">
            <i class="fas fa-book"></i>
        </div>
    </div>
    <div class="card">
        <div>
            <div class="number"><?= 'Rp ' . number_format($totalSemuaDenda); ?></div>
            <div class="cardName">Total Semua Denda</div>
        </div>
        <div class="iconBox iconDenda">
            <i class="fas fa-money-bill"></i>
        </div>
    </div>
</div>


<div class="table">
    <div class="card-table">
        <div class="cardHeader">
            <h2>Buku Yang Belum Kembali</h2>
            <a href="#" class="btn">Lihat Semua</a>
        </div>
        <table>
            <thead>
                <tr>
                    <td>Nama Anggota</td>
                    <td>Nama Buku</td>
                    <td>Batas Waktu Pinjam</td>
                    <td>Denda</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bukuBelumKembali as $bkb) : ?>
                    <?php
                    $waktuPinjam  = date_create($bkb['waktu_kembali']);
                    $waktuSekarang = date_create(); // waktu sekarang
                    $diff  = $waktuPinjam->diff($waktuSekarang);
                    $waktuPinjamStr = strtotime($bkb['waktu_kembali']);
                    $waktuSekarangStr = strtotime('now');
                    $denda = ($diff->days + 1) * 200;
                    ?>
                    <?php if ($waktuSekarangStr > $waktuPinjamStr) : ?>
                        <tr>
                            <td><?= $bkb['nama_anggota']; ?></td>
                            <td><?= $bkb['judul_buku']; ?></td>
                            <td><?= $bkb['waktu_kembali']; ?></td>
                            <td><?= 'Rp.' . number_format($denda, 2, ",", "."); ?></td>
                            <td style="color: red;">Belum Kembali</td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>