
    
<div class="container">
        <header>Tambah Kategori Buku</header>

        <?php if($this->session->flashdata('pesan')): ?>
            <p style = "margin-top: 5px; color: red;"><?= $this->session->flashdata('pesan'); ?></p>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form tambah">
                <div class="details personal">
                    <span class="title"><?php echo validation_errors(); ?></span>
                    <input type="hidden" name="id" id="id" value="<?= $kategori['id'] ?>">
                    <div class="fields">
                        <div class="input-field" style="width:400px">
                            <label for="kategori">Kategori</label>
                            <input type="text" name="kategori" id="kategori" value="<?= $kategori['kategori'] ?>" placeholder="Masukkan Kategori Buku" >
                        </div>
                    </div>
                </div>
                <div>
                    <div class="buttons"> 
                        <div class="backBtn">
                        <a href="<?= base_url();?>Admin_buku/kategori">
                                <span class="btnText">Kembali</span>
                        </a>
                         </div>
                        
                        <button class="sumbit">
                            <span class="btnText">Ubah Kategori</span>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
