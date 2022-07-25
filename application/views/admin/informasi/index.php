<div class="informasi-sekolah" data-informasisekolah="<?= $this->session->flashdata('pesan'); ?>"></div>
<?php if ($this->session->flashdata('pesan')) {
    $this->session->flashdata('pesan');
}
?>


<div id='search-box'>
    <form action='' id='search-form' method='POST' target='_top'>
        <input id='search-text' placeholder='Cari Informasi' type='text' name="keyword_info" autocomplete="off" autofocus>
        <button id='search-button' type='submit' name="cari_info"><i class="fas fa-search"></i></button>
    </form>
</div>

<div class="table">
    <div class="card-table">
        <div class="cardHeader">
            <h2>Informasi</h2>
            <a href="<?= base_url(); ?>Admin_informasi/tambah" class="btn"><i class="fas fa-plus-circle"></i> Tambah Informasi</a>
        </div>

        <table>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Judul Informasi</td>
                    <td>Waktu Pembuatan</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $start = 1;
                foreach ($informasi as $info) :
                ?>
                    <tr>
                        <td><?= ++$start; ?></td>
                        <td><?= $info['judul']; ?></td>
                        <td><?= $info['waktu_pembuatan']; ?></td>

                        <td>
                            <a href="<?= base_url(); ?>Admin_informasi/hapus/<?= $info['id']; ?>" class="hapus hapus-informasi"><i class="fas fa-trash-alt"></i></a>
                            <a href="<?= base_url(); ?>Admin_informasi/ubah/<?= $info['id']; ?>" class="edit"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url(); ?>Admin_informasi/detail/<?= $info['id']; ?>" class="lihat-detail"><i class="fas fa-info"></i></a>
                        </td>
                    </tr>
                <?php
                // $no++;
                endforeach; ?>
            </tbody>
        </table>