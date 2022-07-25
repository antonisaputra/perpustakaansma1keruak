
    <div class="tambah-kategori" data-tambahkategori="<?= $this->session->flashdata('pesan');?>"></div>
        

        <div id='search-box'>
            <form action='' id='search-form' method='POST' target='_top'>
            <input id='search-text' placeholder='Cari Data Anggota' type='text' name="keyword-kategori" autocomplete="off" autofocus>
            <button id='search-button' type='submit' name="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    
        <div class="table">
            <div class="card-table">
                <div class="cardHeader">
                    <h2>Kategori Buku</h2>
                    <a href="<?= base_url();?>Admin_buku/tambahKategori" class="btn"><i class="fas fa-plus-circle"></i> Tambah Kategori Buku</a>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kategori</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if( empty($kategori)) :?>
                        <p style="margin-top:20px; color:red; font-weight:bold;">Kategori Buku Tidak Ditemukan</p>
                    <?php endif; ?>
                        <?php 
                        $no = 1;
                        foreach($kategori as $k):
                        ?>
                        <tr>
                            <td><?= $no;?></td>
                            <td><?= $k['kategori'] ?></td>
                            <td>
                                <a href="<?= base_url();?>Admin_buku/hapusKategori/<?= $k['id']; ?>" class="hapus hapus-kategori"><i class="fas fa-trash-alt"></i></a>
                                <a href="<?=base_url();?>Admin_buku/ubahKategori/<?= $k['id']; ?>" class="edit"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                        
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
        </div>