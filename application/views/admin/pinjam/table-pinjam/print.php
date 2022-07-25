<thead style="text-align:center">
                            <tr>
                                <th>No</th>
                                <th>Nama Anggota</th>
                                <th>Nama Buku</th>
                                <th>Nis/Nip</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach($pinjam as $p): ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $p['nama_anggota']; ?></td>
                                <td><?= $p['judul_buku']; ?></td>
                                <td><?= $p['nis_nip']; ?></td>
                                <td><?= $p['waktu_pinjam']; ?></td>
                                <td><?= $p['waktu_kembali']; ?></td>
                                <td><?= $p['jumlah_buku']; ?></td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach;?>
                        </tbody>            
                        </table>

                        <div class="aksi">
                            <div class="kembali">
                                <a href="<?= base_url(); ?>Buku_dipinjam">Kembali</a>
                            </div>
                            <div class="Print">
                                <a href="<?= base_url(); ?>Buku_dipinjam/printPinjam">Print</a>
                            </div>
                        </div>