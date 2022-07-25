<?php

class Kembalian_terlambat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_dipinjam_model');
        $this->load->library('pagination');
    }
    public function index()
    {
        $data['judul'] = "Perpustakan SMA 1 Keruak | Daftar Pinjam";
        $config['base_url'] = "http://localhost:8080/perpustakaan/kembalian_terlambat/index";
        $data['button'] = $this->input->post('submit');

        if (isset($data['button'])) {
            $data['keyword'] = $this->input->post('cari');
            $this->session->set_flashdata('daftarPinjam', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->flashdata('daftarPinjam');
        }

        $this->db->like('nama_anggota', $data['keyword']);
        $this->db->or_like('judul_buku', $data['keyword']);
        $this->db->or_like('nis_nip', $data['keyword']);

        $this->db->from('pinjam');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['pinjam'] = $this->Buku_dipinjam_model->getPinjam($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('user/tamplates/header', $data);
        $this->load->view('user/kembalian_terlambat/index', $data);
        $this->load->view('user/tamplates/footer');
    }
}
