
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan');?>"></div>
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
        <a href="<?= base_url(); ?>Anggota/printAnggota"><i class="fas fa-print"></i> Print</a>
    </div>
    <div class="excel">
        <a href="<?= base_url(); ?>Anggota/excel"><i class="fas fa-file-excel"></i> Export Excel</a>
    </div>

    <div class="table">
        <div class="card-table">
            <div class="cardHeader">
                <h2>Anggota</h2>
                <a href="<?= base_url();?>Anggota/tambah" class="btn"><i class="fas fa-plus-circle"></i> Tambah Anggota</a>
            </div>

            
            
            <table>
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>NIS/NIP</td>
                        <td>Jenis Kelamin</td>
                        <td>Alamat</td>
                        <td>Status</td>
                        <td>No.Hp</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    foreach($anggota as $peranggota):
                    ?>
                    <tr>
                        <td><?= ++$start;?></td>
                        <td><?= $peranggota['nama']; ?></td>
                        <td><?= $peranggota['nis_nip']; ?></td>
                        <td><?= $peranggota['jenis_kelamin']; ?></td>
                        <td><?= $peranggota['alamat']; ?></td>
                        <td><?= $peranggota['status']; ?></td>
                        <td><?= $peranggota['no_hp']; ?></td>
                        <td>
                            <a href="<?= base_url();?>Anggota/hapus/<?= $peranggota['id']; ?>" class="hapus tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                            <a href="<?=base_url();?>Anggota/ubah/<?= $peranggota['id']; ?>" class="edit"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    <?php 
                    // $no++;
                    endforeach; ?>
                </tbody>
            </table>
            <?= $this->pagination->create_links(); ?>