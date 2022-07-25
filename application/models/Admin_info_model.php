<?php

class Admin_info_model extends CI_Model
{
    public function getAllInformasi()
    {
        return $this->db->query("SELECT * FROM informasi
        ORDER BY id DESC")->result_array();
    }
    public function tambahDataInformasi()
    {
        $gambar = $_FILES['gambar'];

        $config['upload_path'] = FCPATH . '/assets/img/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('pesan', 'Gagal Menambah Gambar Gambar Harus JPG atau PNG');
            redirect('admin_informasi/tambah');
        } else {
            $gambar = $this->upload->data('file_name');
        }


        $data = array(
            'judul' => $this->input->post('judul', true),
            'waktu_pembuatan' => $this->input->post('waktu_pembuatan', true),
            'informasi_singkat' => $this->input->post('informasi_singkat'),
            'informasi_detail' => $this->input->post('informasi_detail'),
            'gambar'  => $gambar
        );

        $this->db->insert('informasi', $data);
    }

    public function getInfoById($id)
    {
        return $this->db->get_where('informasi', ['id' => $id])->row_array();
    }

    public function UbahDataInformasi()
    {
        $gambar = $_FILES['gambar'];

        // if($gambar_buku==''|$gambar_buku==null){

        //  }else{
        $config['upload_path'] = FCPATH . '/assets/img/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $gambar = $this->input->post('gambar_dahulu');
            $data = array(
                'judul' => $this->input->post('judul', true),
                'waktu_pembuatan' => $this->input->post('waktu_pembuatan', true),
                'informasi_singkat' => $this->input->post('informasi_singkat'),
                'informasi_detail' => $this->input->post('informasi_detail'),
                'gambar'  => $gambar
            );

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('informasi', $data);
        } else {
            $gambar = $this->upload->data('file_name');
        }
        // }

        $gambar_lama = $this->input->post('gambar_lama');
        unlink(FCPATH . 'assets/img/' . $gambar_lama);

        $data = array(
            'judul' => $this->input->post('judul', true),
            'waktu_pembuatan' => $this->input->post('waktu_pembuatan', true),
            'informasi_singkat' => $this->input->post('informasi_singkat'),
            'informasi_detail' => $this->input->post('informasi_detail'),
            'gambar'  => $gambar
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('informasi', $data);
    }

    public function hapusInformasi($id)
    {
        $buku = $this->db->get_where('informasi', ['id' => $id])->row_array();
        $gambar_informasi = $buku['gambar'];
        unlink(FCPATH . 'assets/img/' . $gambar_informasi);
        $this->db->where('id', $id);
        $this->db->delete('informasi');
    }

    public function cariDataInformasi(){
        $keyword = $this->input->post('keyword_info');

        $this->db->like('judul', $keyword);
        $this->db->or_like('waktu_pembuatan', $keyword);
        

        return $this->db->get('informasi')->result_array();
    }
}
