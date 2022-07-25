<?php

class Admin_buku_model extends CI_model
{
    public function getAllBuku()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('buku')->result_array();
    }

    public function getAllKategori()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('kategori')->result_array();
    }

    public function jumlahDataBuku()
    {
        return $this->db->get('buku')->num_rows();
    }

    public function getBuku($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('kategori', $keyword);
            $this->db->or_like('penulis', $keyword);
            $this->db->or_like('tahun_terbit', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('buku', $limit, $start)->result_array();
    }

    public function tambahDataBuku()
    {
        $gambar_buku = $_FILES['gambar_buku'];

        $config['upload_path'] = FCPATH . '/assets/img/';
        $config['allowed_types'] = 'jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar_buku')) {
            $this->session->set_flashdata('pesan', 'Gagal Menambah Gambar Gambar Harus JPG atau PNG / Ukuran Terlalu Besar');
            redirect('admin_buku/tambah');
        } else {
            $gambar_buku = $this->upload->data('file_name');
        }

        $data = array(
            'judul' => $this->input->post('judul', true),
            'kategori' => $this->input->post('kategori', true),
            'penulis' => $this->input->post('penulis', true),
            'tahun_terbit' => $this->input->post('tahun_terbit', true),
            'jumlah_buku' => $this->input->post('jumlah_buku', true),
            'gambar_buku'  => $gambar_buku

        );

        $this->db->insert('buku', $data);
    }

    public function tambahKategoriBuku()
    {
        $data = array(
            'kategori' => $this->input->post('kategori', true),
        );

        $this->db->insert('kategori', $data);
    }

    public function hapusDataBuku($id)
    {
        $buku = $this->db->get_where('buku', ['id' => $id])->row_array();
        $gambar_buku = $buku['gambar_buku'];
        unlink(FCPATH . 'assets/img/' . $gambar_buku);
        $this->db->where('id', $id);
        $this->db->delete('buku');
    }

    public function hapusKategoriBuku($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kategori');
    }

    public function getBukuById($id)
    {
        return $this->db->get_where('buku', ['id' => $id])->row_array();
    }

    public function getKategoriBukuById($id)
    {
        return $this->db->get_where('kategori', ['id' => $id])->row_array();
    }

    public function ubahDataBuku()
    {
        $gambar_buku = $_FILES['gambar_buku'];

        // if($gambar_buku==''|$gambar_buku==null){

        //  }else{
        $config['upload_path'] = FCPATH . '/assets/img/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar_buku')) {
            $gambar_lama = $this->input->post('gambar_sebelum');
            $data = array(
                'judul' => $this->input->post('judul', true),
                'kategori' => $this->input->post('kategori', true),
                'penulis' => $this->input->post('penulis', true),
                'tahun_terbit' => $this->input->post('tahun_terbit', true),
                'jumlah_buku' => $this->input->post('jumlah_buku', true),
                'gambar_buku'  => $gambar_lama

            );

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('buku', $data);
            redirect('admin_buku');
            die;
        } else {
            $gambar_buku = $this->upload->data('file_name');
        }
        // }

        $gambar_lama = $this->input->post('gambar_sebelum');
        unlink(FCPATH . 'assets/img/' . $gambar_lama);

        $data = array(
            'judul' => $this->input->post('judul', true),
            'kategori' => $this->input->post('kategori', true),
            'penulis' => $this->input->post('penulis', true),
            'tahun_terbit' => $this->input->post('tahun_terbit', true),
            'jumlah_buku' => $this->input->post('jumlah_buku', true),
            'gambar_buku'  => $gambar_buku

        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('buku', $data);
    }

    public function ubahkategoriBuku($id)
    {
        $data = array(
            'kategori' => $this->input->post('kategori', true),
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kategori', $data);
    }

    public function cariKategoriBuku()
    {
        $keyword = $this->input->post('keyword-kategori');

        $this->db->like('kategori', $keyword);

        return $this->db->get('kategori')->result_array();
    }
}
