<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }
    public function index()
    {
        $data['judul'] = "Perpustakaan SMA 1 Keruak";
        date_default_timezone_set('Asia/Ujung_Pandang');
        $data['tahun'] = date('Y');
        $data['bulan'] = date('m');
        $data['tanggal'] = date('d');
        $data['daftarBukuTerbaru'] = $this->Home_model->daftarBukuTerbaru();
        $data['info'] = $this->Home_model->getAllInfo();

        $this->load->view('user/tamplates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('user/tamplates/footer');
    }

    public function detailInformasi($id){
        $data['judul'] = "Perpustakaan SMA 1 Keruak | Informasi";
        $data['informasi'] = $this->Home_model->getInfoById($id);

        $this->load->view('user/tamplates/header', $data);
        $this->load->view('user/informasi/index', $data);
        $this->load->view('user/tamplates/footer');        
    }

    public function visiMisi(){
        $data['judul'] = "Perpustakaan SMA 1 Keruak | Visi & Misi";
        $this->load->view('user/tamplates/header', $data);
        $this->load->view('user/visi_misi/index', $data);
        $this->load->view('user/tamplates/footer');      
    }
    
    public function profilSekolah(){
        $data['judul'] = "Perpustakaan SMA 1 Keruak | Profil Sekolah";
        $this->load->view('user/tamplates/header', $data);
        $this->load->view('user/profil_sekolah/index', $data);
        $this->load->view('user/tamplates/footer');      
    }
}
