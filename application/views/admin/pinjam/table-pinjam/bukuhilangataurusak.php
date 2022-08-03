
    
<div class="container">
        <header>Buku Hilang Atau Rusak</header>

        <?php if($this->session->flashdata('pesan')): ?>
            <p style = "margin-top: 5px; color: red;"><?= $this->session->flashdata('pesan'); ?></p>
        <?php endif; ?>

        <form action="" method="post">
            <div class="form tambah">
                <div class="details personal">
                    <span class="title"><?php echo validation_errors(); ?></span>

                    <div class="fields">
                        <div class="input-field" style="width:10pc;">
                            <label for="hargabuku">Harga Buku</label>
                            <input type="number" name="hargabuku" id="hargabuku" placeholder="Masukkan Harga Buku Yang Hilang Atau Rusak">
                        </div>
                    </div>

                    
                </div>
                <div>
                    <div class="buttons"> 
                        <div class="backBtn">
                        <a href="<?= base_url();?>Buku_dipinjam">
                                <span class="btnText">Kembali</span>
                        </a>
                         </div>
                        
                        <button class="sumbit" style="background-color:#07a11c">
                            <span class="btnText">Tambah Denda</span>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>