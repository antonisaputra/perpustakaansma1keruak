
    <div class="tambah-buku" data-tambahbuku="<?= $this->session->flashdata('pesan');?>"></div>
    <?php if($this->session->flashdata('pesan')){
        $this->session->flashdata('pesan');
    }    
    ?>
        

    <div id='search-box'>
        <form action='' id='search-form' method='POST' target='_top'>
        <input id='search-text' placeholder='Cari Data Anggota' type='text' name="keyword" autocomplete="off" autofocus>
        <button id='search-button' type='submit' name="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <div class="print">
        <a href="<?= base_url();?>/Admin_buku/print_buku"><i class="fas fa-print"></i> Cetak</a>
    </div>
    <div class="excel">
        <a href="<?= base_url(); ?>Admin_buku/excel"><i class="fas fa-file-excel"></i> Export Excel</a>
    </div>

    <div class="table">
        <div class="card-table">
            <div class="cardHeader">
                <h2>Buku</h2>
                <a href="<?= base_url();?>Admin_buku/tambah" class="btn"><i class="fas fa-plus-circle"></i> Tambah Buku</a>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Judul Buku</td>
                        <td>Kategori</td>
                        <td>Penulis</td>
                        <td>Tahun Terbit</td>
                        <td>Jumlah Buku</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                <?php if( empty($buku)) :?>
                    <p style="margin-top:20px; color:red; font-weight:bold;">Data Buku Tidak Ditemukan</p>
                <?php endif; ?>
                    <?php 
                    $no = 1;
                    foreach($buku as $b):
                    ?>
                    <tr>
                        <td><?= ++$start;?></td>
                        <td><?= $b['judul']; ?></td>
                        <td><?= $b['kategori'];?></td>
                        <td><?= $b['penulis']; ?></td>
                        <td><?= $b['tahun_terbit']; ?></td>
                        <td><?= $b['jumlah_buku']; ?></td>
                        <td>
                            <a href="<?= base_url();?>Admin_buku/hapus/<?= $b['id']; ?>" class="hapus hapus-buku"><i class="fas fa-trash-alt"></i></a>
                            <a href="<?=base_url();?>Admin_buku/ubah/<?= $b['id']; ?>" class="edit"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url();?>Admin_buku/detail/<?= $b['id']; ?>" class="lihat-detail"><i class="fas fa-info"></i></a>
                        </td>
                    </tr>
                    
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
            <?= $this->pagination->create_links(); ?>
    </div>