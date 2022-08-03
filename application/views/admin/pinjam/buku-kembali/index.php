<div class="dikembalikan" data-dikembalikan="<?= $this->session->flashdata('pesan'); ?>"></div>
<div id='search-box'>
    <form action='' id='search-form' method='post' target='_top'>
        <input id='search-text' name='keyword' placeholder='Search' type='text' />
        <button id='search-button' type='submit' name="submit"><span><i class="fas fa-search"></i></span></button>
    </form>
</div>

<div class="print">
    <a href="<?= base_url(); ?>Buku_dipinjam/printPinjam"><i class="fas fa-print"></i> Cetak</a>
</div>
<div class="excel">
    <a href="<?= base_url(); ?>Buku_dipinjam/excel"><i class="fas fa-file-excel"></i> Export Excel</a>
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
                    <td>Waktu Pinjam</td>
                    <td>Batas Waktu</td>
                    <td>Waktu Dikembalikan</td>
                    <td>Denda</td>
                    <td>Status Pinjaman Buku</td>
                    <td>Jumlah</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bukuKembali as $bk) : ?>
                    <tr>
                        <td><?= ++$start; ?></td>
                        <td><?= $bk['nama_anggota']; ?></td>
                        <td><?= $bk['judul_buku']; ?></td>
                        <td><?= $bk['nis_nip']; ?></td>
                        <td><?= $bk['waktu_pinjam']; ?></td>
                        <td><?= $bk['batas_pinjam']; ?></td>
                        <td><?= $bk['waktu_kembali']; ?></td>
                        <td><?= 'Rp.' . number_format($bk['denda']); ?></td>
                        <td><?= $bk['status_pinjaman'] ?></td>
                        <td><?= $bk['jumlah_buku']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->pagination->create_links(); ?>
    </div>