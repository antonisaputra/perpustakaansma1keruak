<?php

class Transaksi_model extends CI_model{
    public function getAnggota(){
        $keyword = $this->input->post('nis_nip');

        $this->db->like('nis_nip', $keyword);

        return $this->db->get('anggota')->result_array();
    }

    public function getAnggotaById($id){
        return $this->db->get_where('anggota', ['id' => $id])->row_array();
    }

    public function getBuku(){
        $keyword = $this->input->post('judul');

        $this->db->like('judul', $keyword);

        return $this->db->get('buku')->result_array();
    }

    public function getBukuById($id){
        return $this->db->get_where('buku', ['id' => $id])->row_array();
    }

    public function tambahPinjam(){
        $data = array(
            'nama_anggota' => $this->session->userdata('transaksi_anggota'),
            'judul_buku' => $this->session->userdata('transaksi_buku'), 
            'nis_nip' => $this->session->userdata('transaksi_anggota_nis_nip'), 
            'waktu_pinjam' => $this->input->post('waktu_pinjam', true),
            'waktu_kembali' => $this->input->post('waktu_kembali', true),
            'jumlah_buku' => $this->input->post('jumlah_buku', true)
        );

        $this->db->insert('pinjam',$data);
    }

    public function kurangiBuku($kurangiBuku,$idBuku){
        $data = array(
            'jumlah_buku' => $kurangiBuku
        );

        $this->db->where('id', $idBuku);
        $this->db->update('buku', $data);
    }
}

?>