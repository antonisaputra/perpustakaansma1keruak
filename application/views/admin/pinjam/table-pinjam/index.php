<div class="dikembalikan" data-dikembalikan="<?= $this->session->flashdata('pesan'); ?>"></div>
<div id='search-box'>
    <form action='' id='search-form' method='post' target='_top'>
        <input id='search-text' name='keyword' placeholder='Search' type='text' />
        <button id='search-button' type='submit' name="cari"><span><i class="fas fa-search"></i></span></button>
    </form>
</div>

<div class="print">
    <a href="<?= base_url(); ?>Buku_dipinjam/printPinjam"><i class="fas fa-print"></i> Cetak</a>
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
                    <td>Waktu Tenggat</td>
                    <td>Denda</td>
                    <td>Jumlah</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($pinjam as $p) : ?>
                    <tr>
                        <td><?= ++$start; ?></td>
                        <td><?= $p['nama_anggota']; ?></td>
                        <td><?= $p['judul_buku']; ?></td>
                        <td><?= $p['nis_nip']; ?></td>
                        <td><?= $p['waktu_pinjam']; ?></td>
                        <td><?= $p['waktu_kembali']; ?></td>
                        <?php
                        $waktuPinjam  = date_create($p['waktu_kembali']);
                        $waktuSekarang = date_create(); // waktu sekarang
                        $diff  = $waktuPinjam->diff($waktuSekarang);
                        $waktuPinjamStr = strtotime($p['waktu_kembali']);
                        $waktuSekarangStr = strtotime('now');
                        $waktuTenggat = $diff->days; 
                        $denda =  intval($waktuTenggat+1) * 1000;
                        ?>
                        <?php if ($waktuSekarangStr < $waktuPinjamStr) : ?>
                            <td><?= 'Rp.0'; ?></td>
                        <?php elseif ($waktuSekarangStr == $waktuPinjamStr) : ?>
                            <td><?= 'Rp.0' ?></td>
                        <?php elseif ($waktuSekarangStr > $waktuPinjamStr) : ?>
                            <td><?= 'Rp.' . number_format($denda, 2, ",", "."); ?></td>
                        <?php endif ?>
                        <td><?= $p['jumlah_buku']; ?></td>
                        <td class="aksi_pinjam">
                            <a href="<?= base_url(); ?>Buku_dipinjam/bukuDikembalikan/<?= $p['id']; ?>" class="buku_dikembalikan" onmouseover="bukuKembaliHover(this)" onmouseout="bukuKembali(this)" style="text-decoration:none;margin-bottom:5px;">Buku Belum Kembali</a>
                            <a href="<?= base_url(); ?>Buku_dipinjam/bukuHilangOrRusak/<?= $p['id'];?>" class="buku_dikembalikan" style="text-decoration:none;margin-bottom:5px;">Buku Hilang Atau Rusak</a>
                            <a href="<?= base_url(); ?>Buku_dipinjam/hapus/<?= $p['id']; ?>" class="hapus hapus-pinjam"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->pagination->create_links(); ?>
    </div>