<?php

class Pengaturan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengaturan_model');
    }

    public function index()
    {
        $data['judul'] = 'Admin Perputakkan | Pengaturan';

        $this->load->view('admin/tamplates/header', $data);
        $this->load->view('admin/pengaturan/index');
        $this->load->view('admin/tamplates/footer');
    }

    public function editProfil()
    {
        $data['judul'] = 'Admin Perpustakan | Edit Profil';

        $data['login'] = $this->db->get_where('login', ['nama_admin' => $this->session->userdata('nama_admin')])->row_array();
        // $data['judul'] = "Admin Perpustakaan | Pengaturan";
        // $password = $this->input->post('password');

        $this->form_validation->set_rules('nama', 'Nama Akun', 'required|trim');
        $this->form_validation->set_rules('email', 'Email Akun', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/tamplates/header', $data);
            $this->load->view('admin/pengaturan/edit_profil', $data);
            $this->load->view('admin/tamplates/footer');
        } else {
            if ($this->input->post('editprofil')) {
                $this->pengaturan_model->editProfil();
                $user = $this->db->get_where('login', ['id' => $this->input->post('id')])->row_array();
                $data = [
                    'nama_admin' => $user['nama_admin'],
                    'gambar' => $user['gambar'],
                ];

                $this->session->set_userdata($data);
                $this->session->set_flashdata('pesan', 'Ubah');
                redirect('pengaturan/editProfil');
            }
        }
    }

    public function gantiPassword()
    {
        $data['login'] = $this->db->get_where('login', ['nama_admin' => $this->session->userdata('nama_admin')])->row_array();
        $data['judul'] = "Admin Perpustakaan | Pengaturan";
        $password = $this->input->post('password_lama');

        $this->form_validation->set_rules('password_lama', 'Password Akun', 'required');
        $this->form_validation->set_rules('passwordBaru', 'Password Baru', 'required|min_length[5]|matches[passwordBaru2]');
        $this->form_validation->set_rules('passwordBaru2', 'Konfirmasi Password Baru', 'required|matches[passwordBaru]');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/tamplates/header', $data);
            $this->load->view('admin/pengaturan/ganti_password', $data);
            $this->load->view('admin/tamplates/footer');
        } else {
            if ($this->input->post('ganti_password')) {
                if (password_verify($password, $data['login']['password'])) {
                    $this->pengaturan_model->gantiPassword($data['login']['id']);
                    $this->session->set_flashdata('pesan', 'Berhasil ');
                    redirect('Pengaturan/gantiPassword');
                } else {
                    $this->session->set_flashdata('pesan', 'Gagal ');
                    redirect('Pengaturan/gantiPassword');
                }
            } elseif ($this->input->post('kembali')) {
                redirect('Pengaturan');
            }
        }
    }
}
