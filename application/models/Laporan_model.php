<?php 

class Laporan_model extends CI_model{
    public function getAllLaporan(){
        return $this->db->query("SELECT * FROM bukukembali
        ORDER BY id DESC")->result_array();
    }
    public function getLaporanPerbulan($bulan,$tahun){
            return $this->db->query("SELECT * FROM bukukembali WHERE month(waktu_kembali) = $bulan and year(waktu_kembali) = $tahun")->result_array();
    }
}

?>