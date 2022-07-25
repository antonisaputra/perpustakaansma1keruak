<?php

class Transaksi_pinjam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');
        if (!$this->session->userdata('nama_admin')) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['judul'] = "Admin Perpustakaan | Transaksi Pinjam";
        $data['jumlah_buku'] = [1, 2];
        date_default_timezone_set('Asia/Ujung_Pandang');
        $data['waktu_sekarang'] = date('d-m-Y');
        // 10hari kedepan
        $time_sekarang = time();
        $data['waktuKembali'] = date("d-m-Y", strtotime("+7 days", $time_sekarang));

        if ($this->input->post('cari')) {
            if ($this->input->post('nis_nip')) {
                $data['anggota'] = $this->Transaksi_model->getAnggota();
            } else {
                redirect('Transaksi_pinjam');
            }
        } elseif ($this->input->post('cari_buku')) {
            if ($this->input->post('judul')) {
                $data['buku'] = $this->Transaksi_model->getBuku();
            } else {
                redirect('Transaksi_pinjam');
            }
        } elseif ($this->input->post('btn_pinjam_buku')) {
            $sessionAnggota = $this->session->userdata('transaksi_anggota');
            $sessionBuku = $this->session->userdata('transaksi_buku');
            if (isset($sessionAnggota) && isset($sessionBuku)) {
                $this->Transaksi_model->tambahPinjam();
                $kurangiBuku = $this->session->userdata('transaksi_buku_jumlah') - $this->input->post('jumlah_buku');
                $idBuku = $this->session->userdata('transaksi_buku_id');
                $this->Transaksi_model->kurangiBuku($kurangiBuku,$idBuku);
                $this->session->set_flashdata('pesan', "Pemesanan Berhasil");
                unset($_SESSION['transaksi_anggota']);
                unset($_SESSION['transaksi_buku']);
                unset($_SESSION['transaksi_buku_jumlah']);
                unset($_SESSION['transaksi_buku_id']);
                unset($_SESSION['transaksi_anggota_nis_nip']);
            } else {
                $data['eror'] = "Pilih Data Anggota dan Buku";
            }
        }

        $this->load->view('admin/tamplates/header', $data);
        $this->load->view('admin/pinjam/transaksi_pinjam/index', $data);
        $this->load->view('admin/tamplates/footer');
    }

    public function masukkanAnggota($id)
    {
        $data['ambilDataAnggota'] = $this->Transaksi_model->getAnggotaById($id);
        $this->session->set_userdata('transaksi_anggota_nis_nip', $data['ambilDataAnggota']['nis_nip']);
        $this->session->set_userdata('transaksi_anggota', $data['ambilDataAnggota']['nama']);
        redirect('Transaksi_pinjam');
    }

    public function masukkanBuku($id)
    {
        $data['ambilDataBuku'] = $this->Transaksi_model->getBukuById($id);
        $this->session->set_userdata('transaksi_buku', $data['ambilDataBuku']['judul']);
        $this->session->set_userdata('transaksi_buku_id', $data['ambilDataBuku']['id']);
        $this->session->set_userdata('transaksi_buku_jumlah', $data['ambilDataBuku']['jumlah_buku']);
        redirect('Transaksi_pinjam');
    }

    public function refresh()
    {
        unset($_SESSION['transaksi_anggota']);
        unset($_SESSION['transaksi_buku']);
        unset($_SESSION['transaksi_buku_jumlah']);
        unset($_SESSION['transaksi_buku_id']);
        unset($_SESSION['transaksi_anggota_nis_nip']);
        redirect('Transaksi_pinjam/index');
    }
}
