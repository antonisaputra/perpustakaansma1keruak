
    
<div class="container">
        <header>Tambah Data Anggota</header>


        <form action="" method="post">
            <div class="form tambah">
                <div class="details personal">
                    <span class="title"><?php echo validation_errors(); ?></span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" placeholder="Masukkan nama Anggota">
                        </div>

                        <div class="input-field">
                            <label for="nis_nip">NIS/NIP</label>
                            <input type="number" name="nis_nip" id="nis_nip" placeholder="Masukkan NIS/NIP (Masukkan Angka)">
                        </div>

                        <div class="input-field">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat Anggota">
                        </div>

                        <div class="input-field">
                            <label for="jenis_kelamin">jenis_kelamin</label>

                            <select name="jenis_kelamin" id="jenis_kelamin">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select> 
                        </div>

                        <div class="input-field">
                            <label for="jenis_kelamin">Status</label>

                            <select name="status" id="status">
                                <option value="Siswa">Siswa</option>
                                <option value="Karyawan">Karyawan</option>
                            </select> 
                        </div>                        

                        <div class="input-field">
                            <label>No HP</label>
                            <input type="number" name="no_hp" id="no_hp" placeholder="Masukkan Nomor heandphone (Masukkan Angka)">
                        </div>                        
                    </div>
                </div>
                <div>
                    <div class="buttons"> 
                        <div class="backBtn">
                        <a href="<?= base_url();?>Anggota">
                                <span class="btnText">Back</span>
                        </a>
                         </div>
                        
                        <button class="sumbit">
                            <span class="btnText">Tambah</span>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
