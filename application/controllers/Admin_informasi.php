<?php

class admin_informasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_info_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Admin Perpustakan SMA 1 KERUAK | Tambah Informasi";

        $info = $this->input->post('cari_info');

        if(isset($info)){
            $data['informasi'] = $this->Admin_info_model->cariDataInformasi();
        }else{

            $data['informasi'] = $this->Admin_info_model->getAllInformasi();
        }

        $this->load->view('admin/tamplates/header', $data);
        $this->load->view('admin/informasi/index', $data);
        $this->load->view('admin/tamplates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Admin Perpustakan SMA 1 KERUAK | Informasi";

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('waktu_pembuatan', 'Waktu Pembuatan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/tamplates/header', $data);
            $this->load->view('admin/informasi/tambah', $data);
            $this->load->view('admin/tamplates/footer');
        } else {
            $this->Admin_info_model->tambahDataInformasi();
            $this->session->set_flashdata('pesan', 'Ditambah');
            redirect('Admin_informasi');
        }
    }

    public function ubah($id)
    {
        $data['judul'] = "Admin Perpustakan SMA 1 KERUAK | Informasi";

        $data['informasi'] = $this->Admin_info_model->getInfoById($id);
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('waktu_pembuatan', 'Waktu Pembuatan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/tamplates/header', $data);
            $this->load->view('admin/informasi/ubah', $data);
            $this->load->view('admin/tamplates/footer');
        } else {
            $this->Admin_info_model->UbahDataInformasi($id);
            $this->session->set_flashdata('pesan', 'Diubah');
            redirect('Admin_informasi');
        }
    }

    public function detail($id)
    {
        $data['judul'] = "Admin Perputakaan | Detail";

        $data['info'] = $this->Admin_info_model->getInfoById($id);
        $this->load->view('admin/tamplates/header', $data);
        $this->load->view('admin/informasi/detail', $data);
        $this->load->view('admin/tamplates/footer');
    }

    public function hapus($id)
    {
        $this->Admin_info_model->hapusInformasi($id);
        $this->session->set_flashdata('pesan', 'DiHapus');
        redirect('Admin_informasi');
    }
}
