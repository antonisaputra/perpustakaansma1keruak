<?php

class Home_model extends CI_model
{
    public function daftarBukuTerbaru()
    {
        return $this->db->query('SELECT * FROM buku')->result_array();
    }
    public function getAllInfo()
    {
        return $this->db->query("SELECT * FROM informasi
        ORDER BY id DESC")->result_array();
    }

    public function getInfoById($id)
    {
        return $this->db->get_where('informasi', ['id' => $id])->row_array();
    }
}
