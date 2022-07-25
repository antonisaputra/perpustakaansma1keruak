<div class="table">
    <div class="card-table">
        <div class="carilaporan">
            <div class="cari-laporan">
                <h2>Laporan Perbulan</h2>
                <form action="<?= base_url() ?>Laporan/printPerbulan" method="post">
                    <div class="bulan-tahun">
                        <label>Bulan</label>
                        <select name="bulan" id="bulan">
                            <?php for ($no = 0; $no < 12; $no++) : ?>
                                <option value="<?= $no + 1; ?>"><?= $bulan[$no]; ?></option>
                            <?php endfor; ?>
                        </select>
                        <label>Tahun</label>
                        <select name="tahun">
                            <?php $tahunsebelum = date('Y') - 50;
                            $tahun = date('Y');
                            ?>
                            <?php while ($tahun >= $tahunsebelum) : ?>
                                <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                            <?php
                                $tahun--;
                            endwhile; ?>
                        </select>
                    </div>
                    <div class="print">
                        <button type="submit" name="printPerbulan"><i class="fas fa-print"></i> Cetak</button>
                    </div>
                    <div class="excel">
                        <a href="<?= base_url(); ?>Laporan/cetakSemua"><i class="fas fa-print"></i> Cetak Semua</a>
                    </div>
                </form>
            </div>

        </div>