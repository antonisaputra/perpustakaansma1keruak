<?php

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        // if ($this->session->userdata('gambar')) {
        //     redirect('Admin');
        // }
    }
    public function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Admin Perpustakan | Login";
            $this->load->view('admin/auth/login', $data);
        } else {
            // validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('login', ['nama_admin' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'nama_admin' => $user['nama_admin'],
                    'gambar' => $user['gambar'],
                ];

                $this->session->set_userdata($data);
                redirect('Admin');
            } else {
                $this->session->set_flashdata('pesan', 'Password Salah!');
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Maaf Akun Anda Salah!');
            redirect('Login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nama_admin');
        $this->session->unset_userdata('gambar');
        redirect('Login');
    }

    public function Registrasi()
    {
        $data = [
            'nama_admin' => 'admin',
            'email' => 'antonisaputra614@gmail.com',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'gambar' => 'default.jpg'
        ];

        $this->db->insert('login', $data);
        
    }

}
