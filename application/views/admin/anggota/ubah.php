
    
<div class="container">
        <header>Ubah Data Anggota</header>

        <form action="" method="post">
            <div class="form tambah">
                <div class="details personal">
                    <span class="title"><?php echo validation_errors(); ?></span>
                    <input type="hidden" name="id" value="<?= $anggota['id']; ?>">
                    <div class="fields">
                        <div class="input-field">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" placeholder="Masukkan nama Anggota" value="<?= $anggota['nama']; ?>">
                        </div>

                        <div class="input-field">
                            <label for="nis_nip">NIS/NIM</label>
                            <input type="number" name="nis_nip" id="nis_nip" placeholder="Masukkan NIS/NIP (Masukkan Angka)" value="<?= $anggota['nis_nip']; ?>">
                        </div>

                        <div class="input-field">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat Anggota" value="<?= $anggota['alamat']; ?>">
                        </div>

                        <div class="input-field">
                            <label for="jenis_kelamin">jenis_kelamin</label>

                            <select name="jenis_kelamin" id="jenis_kelamin">
                                <?php foreach( $jenis_kelamin as $JK) :?>
                                    <?php if($JK == $anggota['jenis_kelamin']) :?>
                                        <option value="<?= $JK; ?>" selected><?= $JK; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $JK; ?>"><?= $JK; ?></option>
                                    <?php endif; ?>
                                <?php endforeach;?>
                            </select> 
                        </div>

                        <div class="input-field">
                            <label for="status">Status</label>

                            <select name="status" id="status">
                                <?php foreach($status as $st) :?>
                                    <?php if( $st == $anggota['status']) :?>
                                        <option value="<?= $st ?>" selected><?= $st ?></option>
                                    <?php else : ?>
                                        <option value="<?= $st ?>"><?= $st ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select> 
                        </div>                        

                        <div class="input-field">
                            <label>No HP</label>
                            <input type="number" name="no_hp" id="no_hp" placeholder="Masukkan Nomor heandphone (Masukkan Angka)" value="<?= $anggota['no_hp']; ?>">
                        </div>                        
                    </div>
                </div>
                <div>
                    <div class="buttons"> 
                        <div class="backBtn">
                        <a href="<?= base_url();?>anggota">
                                <span class="btnText">Back</span>
                        </a>
                         </div>
                        
                        <button class="sumbit">
                            <span class="btnText">Ubah</span>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
