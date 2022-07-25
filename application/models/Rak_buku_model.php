<?php

class Rak_buku_model extends CI_Model
{
    public function getAllBuku()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('Buku')->result_array();
    }

    public function getBuku($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('kategori', $keyword);
            $this->db->or_like('penulis', $keyword);
            // $this->db->or_like('penerbit', $keyword);
            $this->db->or_like('tahun_terbit', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('buku', $limit, $start)->result_array();
    }

    public function getBukuKategori($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('kategori', $keyword);
            $this->db->or_like('penulis', $keyword);
            // $this->db->or_like('penerbit', $keyword);
            $this->db->or_like('tahun_terbit', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('buku', $limit, $start)->result_array();
    }

    public function getAllKategori()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('kategori')->result_array();
    }

    public function kategoriRakBuku($kategori)
    {
        return $this->db->get_where('buku', ['kategori' => $kategori])->result_array();
    }

    public function getBukuById($id)
    {
        return $this->db->get_where('buku', ['id' => $id])->row_array();
    }
}
