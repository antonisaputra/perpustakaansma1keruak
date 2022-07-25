<?php

class Registrasi extends CI_Controller
{
    public function index()
    {
        $data = [
            'nama_admin' => 'admin',
            'email' => 'antonisaputra614@gmail.com',
            'password' => password_hash('admin', PASSWORD_DEFAULT)
        ];

        $this->db->insert('login', $data);
    }
}
