<?php

class Buku_dikembalikan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Buku_dikembalikan_model');
        $this->load->library('pagination');
        if(!$this->session->userdata('nama_admin')){
            redirect('Login');
        }
    }

    public function index(){
        $config['base_url'] = "http://localhost:8080/perpustakaan/Buku_dikembalikan/index";
        $data['judul'] = "Admin Perpustakkan | Data Buku Dikembalikan";
        $data['button'] = $this->input->post('submit');

        if(isset($data['button'])){
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        }else{
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('nama_anggota', $data['keyword']);
        $this->db->from('bukukembali');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);
        
        
        $data['start'] = $this->uri->segment(3);
        $data['bukuKembali'] = $this->Buku_dikembalikan_model->getBukuKembali($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('admin/tamplates/header', $data);
        $this->load->view('admin/pinjam/buku-kembali/index', $data);
        $this->load->view('admin/tamplates/footer');
    }
}
