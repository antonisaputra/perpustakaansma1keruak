<?php

class Rak_buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rak_buku_model', 'rakBuku');
        $this->load->library('pagination');
    }
    public function index()
    {
        $data['judul'] = "Perpustakaan SMA 1 KERUAK | Rak Buku";

        $button = $this->input->post('tombol_cari_buku');

        if (isset($button)) {
            $data['keyword'] = $this->input->post('buku');
            $this->session->set_flashdata('buku', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->flashdata('buku');
        }

        $this->db->like('judul', $data['keyword']);
        $this->db->or_like('kategori', $data['keyword']);
        $this->db->or_like('penulis', $data['keyword']);
        $this->db->or_like('tahun_terbit', $data['keyword']);
        $this->db->from('buku');
        $config['base_url'] = "https://sma1keruak.000webhostapp.com/Rak_buku/index";
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['daftarBuku'] = $this->rakBuku->getBuku($config['per_page'], $data['start'], $data['keyword']);

        // $data['daftarBuku'] = $this->rakBuku->getAllBuku();
        $data['kategori'] = $this->rakBuku->getAllKategori();
        $this->load->view('user/tamplates/header', $data);
        $this->load->view('user/rak buku/index', $data);
        $this->load->view('user/tamplates/footer');
    }

    public function kategori()
    {
        $data['judul'] = "Perpustakaan SMA 1 KERUAK | Kategori";
        $kategori = $_GET['filter'];

        if (isset($button)) {
            $data['keyword'] = $this->input->post('cari_buku');
            $this->session->set_flashdata('bukukategori', $data['keyword']);
            $this->db->like('judul', $data['keyword']);
            $this->db->or_like('kategori', $data['keyword']);
            $this->db->or_like('penulis', $data['keyword']);
            $this->db->or_like('tahun_terbit', $data['keyword']);
            $this->db->from('buku');
            $config['base_url'] = "http://localhost:8080/perpustakaan/rak_buku/index";
            $config['total_rows'] = $this->db->count_all_results();
            $config['per_page'] = 3;

            $this->pagination->initialize($config);

            $data['start'] = $this->uri->segment(3);
            $data['daftarBuku'] = $this->rakBuku->getBuku($config['per_page'], $data['start'], $data['keyword'], $kategori);

            // $data['daftarBuku'] = $this->rakBuku->kategoriRakBuku($kategori);
            $data['kategori'] = $this->rakBuku->getAllKategori();
            $this->load->view('user/tamplates/header', $data);
            $this->load->view('user/rak buku/index', $data);
            $this->load->view('user/tamplates/footer');
        } else {
            $data['daftarBuku'] = $this->rakBuku->kategoriRakBuku($kategori);
            $data['kategori'] = $this->rakBuku->getAllKategori();
            $this->load->view('user/tamplates/header', $data);
            $this->load->view('user/rak buku/index', $data);
            $this->load->view('user/tamplates/footer');
        }
    }

    public function detail($id)
    {
        $data['judul'] = "Perpustakaan SMA 1 KERUAK | Rak Buku";

        $data['detailBuku'] = $this->rakBuku->getBukuById($id);

        $this->load->view('user/tamplates/header', $data);
        $this->load->view('user/rak buku/detail', $data);
        $this->load->view('user/tamplates/footer');
    }
}
