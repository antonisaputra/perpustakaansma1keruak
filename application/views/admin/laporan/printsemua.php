<thead>
			<tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>NIS/NIP</th>
                <th>Waktu Pinjam</th>
                <th>Batas Pinjam</th>
                <th>Waktu Kembali</th>
                <th>Jumlah Buku</th>
                <th>Denda</th> 
                <th>Status Pinjaman Buku</th>
			</tr>
		</thead>
		<tbody>
            <?php if(empty($laporan)): ?>
                <td colspan="9" style="text-align:center;font-size:20px">Tidak Ada Data</td>
            <?php else: ?>
            <?php 
            $no = 1;
            $totalDenda = 0;
            foreach($laporan as $l):
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $l['nama_anggota']; ?></td>
                <td><?= $l['judul_buku']; ?></td>
                <td><?= $l['nis_nip']; ?></td>
                <td><?= $l['waktu_pinjam']; ?></td>
                <td><?= $l['batas_pinjam']; ?></td>
                <td><?= $l['waktu_kembali']; ?></td>
                <td><?= $l['jumlah_buku']; ?></td>
                <td><?= 'Rp.'.number_format($l['denda'],2,",","."); ?></td>
                <td><?= $l['status_pinjaman']; ?></td>
                <?php $totalDenda += $l['denda']; ?>
            </tr>
            <?php 
            $no++;
            endforeach; ?>
                <td colspan = "8" style="text-align:center;font-size:20px">Total Denda</td>
                <td colspan><?= 'Rp.'.number_format($totalDenda,2,",","."); ?></td>
            <?php endif;?>
		</tbody>
        </table>

        <div class="aksi">
            <div class="kembali">
                <a href="<?= base_url(); ?>Laporan">Kembali</a>
            </div>

            <div>
                <div class="print">
                    <a href="<?= base_url();?>Laporan/PrintSemua">Print Semua Data</a>
                </div>
            </div>
        </div>