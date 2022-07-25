<?php

class Pengaturan_model extends CI_Model
{
    public function editProfil()
    {
        $gambar = $_FILES['gambar'];

        // if($gambar==''|$gambar==null){

        //  }else{
        $config['upload_path'] = FCPATH . '/assets/img/';
        $config['allowed_types'] = 'jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $gambar = $this->input->post('gambar_lama');

            $data = array(
                'nama_admin' => $this->input->post('nama', true),
                'email' => $this->input->post('email', true),
                'gambar'  => $gambar

            );

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('login', $data);
        } else {
            $gambar = $this->upload->data('file_name');
        }
        // }

        $gambar_lama = $this->input->post('gambar_lama');

        if ($gambar_lama != 'default.jpg') {
            unlink(FCPATH . 'assets/img/' . $gambar_lama);
        }
        $data = array(
            'nama_admin' => $this->input->post('nama', true),
            'email' => $this->input->post('email', true),
            'gambar'  => $gambar
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('login', $data);
    }

    public function ubahLogin($id)
    {
        $gambar_profil = $_FILES['gambar'];

        // if($gambar_buku==''|$gambar_buku==null){

        //  }else{
        $config['upload_path'] = FCPATH . '/assets/img/';
        $config['allowed_types'] = 'jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar_buku')) {
            $gambar_profil = $this->input->post('gambar_lama');
            $data = array(
                'nama_admin' => $this->input->post('nama', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('passwordBaru'), PASSWORD_DEFAULT),
                'gambar'  => $gambar_profil

            );

            $this->db->where('id', $id);
            $this->db->update('login', $data);
        } else {
            $gambar_profil = $this->upload->data('file_name');
        }
        // }


        $data = array(
            'nama_admin' => $this->input->post('nama', true),
            'email' => $this->input->post('email', true),
            'password' => password_hash($this->input->post('passwordBaru'), PASSWORD_DEFAULT),
            'gambar'  => $gambar_profil
        );

        $this->db->where('id', $id);
        $this->db->update('login', $data);
    }

    public function gantiPassword($id)
    {
        $password = $this->input->post('passwordBaru', true);
        $data = array(
            'password' => password_hash($password, PASSWORD_DEFAULT)
        );

        $this->db->where('id', $id);
        $this->db->update('login', $data);
    }
}
