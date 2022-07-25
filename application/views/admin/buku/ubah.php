
    
<div class="container">
        <header>Ubah Data Buku</header>

        <?php if($this->session->flashdata('pesan')): ?>
            <p style = "margin-top: 5px; color: red;"><?= $this->session->flashdata('pesan'); ?></p>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form tambah">
                <div class="details personal">
                    <span class="title"><?php echo validation_errors(); ?></span>

                    <input type="hidden" name="id" id="id" value="<?= $buku['id']; ?>">
                    <input type="hidden" name="gambar_sebelum" id="gambar_sebelum" value="<?= $buku['gambar_buku']; ?>">
                    <div class="fields">
                        <div class="input-field">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" placeholder="Masukkan Judul Buku" value="<?= $buku['judul']; ?>">
                        </div>

                        <div class="input-field">
                            <label for="kategori">Kategori</label>

                            <select name="kategori" id="kategori">
                                <?php foreach( $kategori as $k):?>
                                    <?php if($k['kategori'] == $buku['kategori']) :?>
                                        <option value="<?= $k['kategori']; ?>" selected><?= $k['kategori']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $k['kategori']; ?>"><?= $k['kategori']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach;?>
                            </select> 
                        </div>

                        <div class="input-field">
                            <label for="penulis">Penulis</label>
                            <input type="text" name="penulis" id="penulis" placeholder="Masukkan penulis Buku" value="<?= $buku['penulis']; ?>">
                        </div>

                        <div class="input-field">
                            <label for="tahun_terbit">Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" id="tahun_terbit" placeholder="Masukkan Tahun Terbit Buku (Masukkan Angka)" value="<?= $buku['tahun_terbit']; ?>">
                        </div> 

                        <div class="input-field">
                            <label for="jumlah_buku">jumlah Buku</label>
                            <input type="number" name="jumlah_buku" id="jumlah_buku" placeholder="Masukkan Tahun Terbit Buku (Masukkan Angka)" value="<?= $buku['jumlah_buku']; ?>">
                        </div>                     
                        
                        <div class="input-field">
                            
                            <label for="gambar_buku">Gambar Buku</label>
                            <img src="<?= base_url();?>assets/img/<?= $buku['gambar_buku'];?>" width="80" alt="" srcset="">
                            <input type="file" name="gambar_buku" id="gambar_buku" style="border:none;">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="buttons"> 
                        <div class="backBtn">
                        <a href="<?= base_url();?>Admin_buku">
                                <span class="btnText">Kembali</span>
                        </a>
                         </div>
                        
                        <button class="sumbit">
                            <span class="btnText">Ubah Buku</span>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
