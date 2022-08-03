<?php

class Buku_dipinjam extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_dipinjam_model');
        $this->load->library('pagination');
        if (!$this->session->userdata('nama_admin')) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['judul'] = "Admin Perpustakaan | Table Buku Dipinjam";
        $config['base_url'] = "http://localhost:8080/perpustakaan/Buku_dipinjam/index";
        $data['button'] = $this->input->post('cari');

        if (isset($data['button'])) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_flashdata('pinjam', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->flashdata('pinjam');
        }

        $this->db->like('nama_anggota', $data['keyword']);
        $this->db->or_like('judul_buku', $data['keyword']);
        $this->db->or_like('nis_nip', $data['keyword']);

        $this->db->from('pinjam');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['pinjam'] = $this->Buku_dipinjam_model->getPinjam($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('admin/tamplates/header', $data);
        $this->load->view('admin/pinjam/table-pinjam/index', $data);
        $this->load->view('admin/tamplates/footer');
    }

    public function bukuDikembalikan($id)
    {
        $pinjam = $this->Buku_dipinjam_model->getPinjamById($id);
        $getBuku = $this->db->get_where('buku', ['judul' => $pinjam['judul_buku']])->row_array();
        
        // denda
        date_default_timezone_set('Asia/Ujung_Pandang');
        $waktuPinjam  = date_create($pinjam['waktu_kembali']);
        $waktuSekarang = date_create(); // waktu sekarang
        $diff  = $waktuPinjam->diff($waktuSekarang);
        $waktuPinjamStr = strtotime($pinjam['waktu_kembali']);
        $waktuSekarangStr = strtotime('now');
        $waktutenggat = ($diff->d);
        $denda = intval($waktutenggat) * 2000;
        if ($waktuSekarangStr < $waktuPinjamStr) {
            $dendaBuku = 0;
            $statusPinjaman = "Tepat Waktu";
        } elseif ($waktuSekarangStr == $waktuPinjamStr) {
            $dendaBuku = 0;
            $statusPinjaman = "Tepat Waktu";
        } elseif ($waktuSekarangStr > $waktuPinjamStr) {
            $dendaBuku = $denda;
            $statusPinjaman = "Denda";
        }

        echo $statusPinjaman;die;
        $this->Buku_dipinjam_model->tambahBukuKembali($id, $dendaBuku, $statusPinjaman);
        $this->Buku_dipinjam_model->ubahDataBuku($getBuku['id'],$pinjam['jumlah_buku'],$getBuku['jumlah_buku']);
        $this->session->set_flashdata('pesan', 'Dikembalikan');

        $this->Buku_dipinjam_model->hapusDataPinjam($id);
        redirect('Buku_dipinjam');
    }

    public function bukuHilangOrRusak($id){
        $getPinjam = $this->Buku_dipinjam_model->getPinjamById($id);
        $getBuku = $this->db->get_where('buku', ['judul' => $getPinjam['judul_buku']])->row_array();

        // denda
        $hargaBuku = $this->input->post('hargabuku');
        date_default_timezone_set('Asia/Ujung_Pandang');
        $waktuPinjam  = date_create($getPinjam['waktu_kembali']);
        $waktuSekarang = date_create(); // waktu sekarang
        $diff  = $waktuPinjam->diff($waktuSekarang);
        $waktuPinjamStr = strtotime($getPinjam['waktu_kembali']);
        $waktuSekarangStr = strtotime('now');
        $waktutenggat = ($diff->d); 
        $denda = ($diff->d) * 1000;

        $jumlahBuku = $getPinjam['jumlah_buku'];
        if ($waktuSekarangStr < $waktuPinjamStr) {
            $dendaBuku = $getPinjam['jumlah_buku']*$hargaBuku;
            $statusPinjaman = "Buku Hilang Atau Rusak";
        } elseif ($waktuSekarangStr == $waktuPinjamStr) {
            $dendaBuku = $getPinjam['jumlah_buku']*$hargaBuku;
            $statusPinjaman = "Buku Hilang Atau Rusak";
        } elseif ($waktuSekarangStr > $waktuPinjamStr) {
            $dendaBuku = $denda+($jumlahBuku*$hargaBuku);
            $statusPinjaman = "Buku Hilang Atau Rusak Dan Denda";
        }
        $this->form_validation->set_rules('hargabuku','Harga Buku','required');
        
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = "Admin Perpustakaan SMA 1 Keruak | Buku hilang atau rusak";
            $this->load->view('admin/tamplates/header_form', $data);
            $this->load->view('admin/pinjam/table-pinjam/bukuhilangataurusak');
            $this->load->view('admin/tamplates/footer_form');
        }else{
            $this->Buku_dipinjam_model->tambahBukuKembali($id, $dendaBuku, $statusPinjaman);
            $this->Buku_dipinjam_model->ubahDataBuku($getBuku['id'],$getPinjam['jumlah_buku'],$getBuku['jumlah_buku']);
            $this->session->set_flashdata('pesan', 'Dikembalikan');

            $this->Buku_dipinjam_model->hapusDataPinjam($id);
            redirect('Buku_dipinjam');
        }
    }
    

    public function hapus($id)
    {
        $this->Buku_dipinjam_model->hapusDataPinjam($id);
        $this->session->set_flashdata('pesan', 'DiHapus');
        redirect('Buku_dipinjam');
    }

    public function printPinjam()
    {
        $data['judul'] = "Data Peminjam Perpustakaan SMA 1 Keruak";

        $data['pinjam'] = $this->Buku_dipinjam_model->getAllPinjam();
        $this->load->view('admin/tamplates/header_print', $data);
        $this->load->view('admin/pinjam/table-pinjam/print', $data);
        $this->load->view('admin/tamplates/footer_print');
    }


   
}
