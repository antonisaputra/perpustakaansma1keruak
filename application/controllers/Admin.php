<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->model('Admin_buku_model');
        $this->load->model('Buku_dipinjam_model');
        if (!$this->session->userdata('nama_admin')) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['jumlahDataAnggota'] = $this->Anggota_model->jumlahDataAnggota();
        $data['jumlahDataBuku'] = $this->Admin_buku_model->jumlahDataBuku();
        $data['jumlahDataPinjam'] = $this->Buku_dipinjam_model->jumlahDataPinjam();
        $ambilDataDenda = $this->db->get('bukukembali')->result_array();
        $dataDenda = 0;
        foreach ($ambilDataDenda as $denda) {
            $dataDenda += $denda['denda'];
        }

        $data['bukuBelumKembali'] = $this->Buku_dipinjam_model->getAllPinjam();

        $data['totalSemuaDenda'] = $dataDenda;

        $data['judul'] = "Admin Perpustakaan | Beranda";
        $this->load->view('admin/tamplates/header', $data);
        $this->load->view('admin/home/index', $data);
        $this->load->view('admin/tamplates/footer');
    }
}
