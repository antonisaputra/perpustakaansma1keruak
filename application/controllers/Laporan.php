<?php

class Laporan extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Laporan_model');
        if(!$this->session->userdata('nama_admin')){
            redirect('Login');
        }
    }

    public function index(){
        $data['judul'] = "Admin Perpustakaan | Laporan";
        $data['bulan'] = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

        $this->load->view('admin/tamplates/header', $data);
        $this->load->view('admin/laporan/index', $data);
        $this->load->view('admin/tamplates/footer');
    }

    public function printPerbulan(){
        $ambilbulan = $this->input->post('bulan');
        $ambiltahun = $this->input->post('tahun');
        $data['bulan'] = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        $data['laporan'] = $this->Laporan_model->getLaporanPerbulan($ambilbulan,$ambiltahun);
        $data['judul'] = "Laporan Perpustakaan SMA 1 Keruak Bulan ". $data['bulan'][$ambilbulan-1];
        $data['data_bulan'] = $ambilbulan;
        $data['data_tahun'] = $ambiltahun; 

        $this->load->view('admin/tamplates/header_print', $data);
        $this->load->view('admin/laporan/printperbulan', $data);
        $this->load->view('admin/tamplates/footer_print');
    }

    public function cetakSemua(){
        $data['judul'] = "Laporan Perpustakaan SMA 1 Keruak";
        $data['laporan'] = $this->Laporan_model->getAllLaporan();

        $this->load->view('admin/tamplates/header_print', $data);
        $this->load->view('admin/laporan/printsemua', $data);
        $this->load->view('admin/tamplates/footer_print');        
    }

    public function Print($data_bulan,$data_tahun){
        $ambilbulan = $data_bulan;
        $ambiltahun = $data_tahun;
        $data['bulan'] = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        $data['laporan'] = $this->Laporan_model->getLaporanPerbulan($ambilbulan,$ambiltahun);
        $data['judul'] = "Laporan Perpustakaan SMA 1 Keruak Bulan ". $data['bulan'][$ambilbulan-1];
        $data['data_bulan'] = $ambilbulan;
        $data['data_tahun'] = $ambiltahun; 

        $this->load->view('admin/tamplates/header_print', $data);
        $this->load->view('admin/laporan/print', $data);
        $this->load->view('admin/tamplates/footer_print');
    }

    public function printSemua(){
        $data['judul'] = "Laporan Perpustakaan SMA 1 Keruak";
        $data['laporan'] = $this->Laporan_model->getAllLaporan();

        $this->load->view('admin/tamplates/header_print', $data);
        $this->load->view('admin/laporan/print', $data);
        $this->load->view('admin/tamplates/footer_print'); 
    }
}