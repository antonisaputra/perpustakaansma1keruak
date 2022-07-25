<div class="transaksi" data-transaksi="<?= $this->session->flashdata('pesan');?>"></div>
            
            <div class="table">
                <div class="card-table">
                    <div class="waktu_sekarang">
                        <p>Waktu Sekarang : <?= $waktu_sekarang;?></p>
                        <p>Waktu 7 Hari Kedepan : <?= $waktuKembali;?></p>

                    </div>            
                    
                <div class="cariAnggota">
                    <div class="cari-nis-nip">
                        <form action="" method="post">
                            <label for="nis_nip">Cari NIS/NIP</label><br>
                            <input type="text" name="nis_nip" id="nis_nip" require>
                            <input type="submit" value="Cari Anggota" name="cari">
                        </form>
                    </div>
                    <div class="table-anggota">
                        <table>
                            <tr>
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIS/NIP</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($anggota)):?>
                                <?php $no = 1; ?>
                                <?php foreach($anggota as $peranggota): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $peranggota['nama'] ?></td>
                                    <td><?= $peranggota['nis_nip'] ?></td>
                                    <td><?= $peranggota['jenis_kelamin'] ?></td>
                                    <td><?= $peranggota['alamat'] ?></td>
                                    <td><?= $peranggota['status'] ?></td>
                                    <td><a href="<?= base_url();?>Transaksi_pinjam/masukkanAnggota/<?=$peranggota['id'];?>" class="tambah_pinjam"><i class="fas fa-plus-circle"></i></a></td>
                                </tr>
                                <?php endforeach;?>
                                <?php else: ?>
                                    <tr>

                                    </tr>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="cariBuku">
                    <div class="cari-nama">
                        <form action="" method="post">
                            <label for="nama">Cari Judul Buku</label><br>
                            <input type="text" name="judul" id="judul">
                            <input type="submit" value="Cari Buku" name="cari_buku">
                        </form>
                    </div>
                    <div class="table-buku">
                        <table>
                            <tr>
                            <thead>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Jumlah Buku</th>
                                <th>Gambar Buku</th>
                                <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($buku)):?>
                                <?php $no = 1; ?>
                                <?php foreach($buku as $b): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $b['judul'] ?></td>
                                    <td><?= $b['penulis'] ?></td>
                                    <td><?= $b['jumlah_buku'] ?></td>
                                    <td><img src="<?= base_url();?>/assets/img/<?= $b['gambar_buku'];?>" style="width:20px;"></td>
                                    <?php if($b['jumlah_buku'] == 0): ?>
                                    <td></td>
                                    <?php else:?>
                                    <td><a href="<?= base_url();?>Transaksi_pinjam/masukkanBuku/<?=$b['id'];?>" class="tambah_pinjam"><i class="fas fa-plus-circle"></i></a></td>
                                    <?php endif; ?>
                                </tr>
                                <?php endforeach;?>
                                <?php else: ?>
                                    <tr>

                                    </tr>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="input-transaksi">
                    <form action="" method="post">
                        <table>
                            <thead>
                                <th>No</th>
                                <th>Nama Anggota</th>
                                <th>Nama Buku</th>
                                <th>Waktu Pinjam</th>
                                <th>Waktu Kembali</th>
                                <th>Jumlah Buku</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <?php if($this->session->userdata('transaksi_anggota')): ?>
                                    <td><?= $this->session->userdata('transaksi_anggota');?></td>
                                    <?php else: ?>
                                    <td> </td>
                                    <?php endif; ?>
                                    <?php if($this->session->userdata('transaksi_buku')): ?>
                                    <td><?= $this->session->userdata('transaksi_buku');?></td>
                                    <?php else: ?>
                                    <td> </td>
                                    <?php endif; ?>
                                    <td>
                                        <input type="date" name="waktu_pinjam" id="waktu_pinjam" required>
                                    </td>
                                    <td><input type="date" name="waktu_kembali" id="waktu_kembali" required></td>
                                    <td>
                                    <select name="jumlah_buku" id="jumlah_buku">
                                        <?php foreach($jumlah_buku as $jk): ?>
                                        <option value="<?= $jk; ?>"><?= $jk; ?></option>
                                        <?php endforeach;?>
                                    </select> 
                                    </td>
                                </tr>
                            </tbody>        
                        </table>
                        <?php if(isset($eror)):?>
                        <div class="pemberitahuan_eror">
                            <p class="eror"><?= $eror; ?></p>
                        </div>
                        <?php endif; ?>
                        <span class="title"><?php echo validation_errors(); ?></span>
                        <a href="<?= base_url();?>Transaksi_pinjam/refresh" class="refresh">Refresh</a>
                        <input type="submit" name="btn_pinjam_buku" id="btn_pinjam" value="Pinjam Buku">
                    </form>
                </div>
                </div>
            </div>