<?php

class Buku_dikembalikan_model extends CI_model{
    public function getAllBukuKembali(){
        return $this->db->query("SELECT * FROM bukukembali
        ORDER BY id DESC")->result_array();
    }

    public function getBukuKembali($limit, $start, $keyword = null){
        if($keyword){
            $this->db->like('nama_anggota', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('bukukembali', $limit, $start)->result_array();
    }
}

?>