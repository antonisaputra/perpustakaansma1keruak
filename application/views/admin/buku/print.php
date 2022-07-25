        
		<thead>
			<tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>Jumlah Admin_buku</th>
                <th>Gambar</th>
			</tr>
		</thead>
		<tbody>
                    <?php 
                    $no = 1;
                    foreach($buku as $b):
                    ?>
                    <tr>
                        <td><?= $no?></td>
                        <td><?= $b['judul']; ?></td>
                        <td><?= $b['penulis']; ?></td>
                        <td><?= $b['tahun_terbit']; ?></td>
                        <td><?= $b['jumlah_buku']; ?></td>
                        <td><img src="<?= base_url()?>assets/img/<?= $b['gambar_buku']; ?>" alt="" srcset="" width="80"></td>
                    </tr>
                    
                    <?php $no++;
                    endforeach; ?>
                
		</tbody>
	