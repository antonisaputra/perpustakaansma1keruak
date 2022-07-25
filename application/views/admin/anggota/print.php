        
		<thead>
			<tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>NIS/NIP</th>
                <th>Status</th>
                <th>Alamat</th>
                <th>No.Hp</th> 
			</tr>
		</thead>
		<tbody>
            <?php 
            $no = 1;
            foreach($anggota as $peranggota):
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $peranggota['nama']; ?></td>
                <td><?= $peranggota['nis_nip']; ?></td>
                <td><?= $peranggota['jenis_kelamin']; ?></td>
                <td><?= $peranggota['alamat']; ?></td>
                <td><?= $peranggota['status']; ?></td>
                <td><?= $peranggota['no_hp']; ?></td>
            </tr>
            <?php 
            $no++;
            endforeach; ?>
                
		</tbody>
        </table>

        <div class="aksi">
            <div class="kembali">
                <a href="<?= base_url(); ?>Anggota">Kembali</a>
            </div>
            <div class="Print">
                <a href="<?= base_url(); ?>Anggota/printAnggota">Print</a>
            </div>
        </div>
	