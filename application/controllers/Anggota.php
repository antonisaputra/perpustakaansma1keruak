<?php

class Anggota extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        if (!$this->session->userdata('nama_admin')) {
            redirect('Login');
        }
    }


    public function index()
    {

        $config['base_url'] = "http://localhost:8080/perpustakaan/Anggota/index";
        $data['judul'] = "Admin Perpustakaan | Anggota";
        $data['button'] = $this->input->post('submit');

        if (isset($data['button'])) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_flashdata('anggota', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->flashdata('anggota');
        }

        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('nis_nip', $data['keyword']);
        $this->db->or_like('jenis_kelamin', $data['keyword']);
        $this->db->or_like('alamat', $data['keyword']);
        $this->db->or_like('status', $data['keyword']);
        $this->db->or_like('no_hp', $data['keyword']);
        $this->db->from('anggota');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(3);
        $data['anggota'] = $this->Anggota_model->getAnggota($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view('admin/tamplates/header', $data);
        $this->load->view('admin/anggota/index', $data);
        $this->load->view('admin/tamplates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Admin Perpustakaan | Tambah Anggota';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nis_nip', 'NIS/NIP', 'required|numeric');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/tamplates/header_form', $data);
            $this->load->view('admin/anggota/tambah');
            $this->load->view('admin/tamplates/footer_form');
        } else {
            $this->Anggota_model->tambahDataAnggota();
            $this->session->set_flashdata('pesan', 'Ditambah');
            redirect('Anggota');
        }
    }

    public function ubah($id)
    {
        $data['judul'] = 'Admin Perpustakaan | Tambah Anggota';
        $data['anggota'] = $this->Anggota_model->getAnggotaById($id);
        $data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];
        $data['status'] = ['Siswa', 'Karyawan'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nis_nip', 'NIS/NIP', 'required|numeric');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/tamplates/header_form', $data);
            $this->load->view('admin/anggota/ubah');
            $this->load->view('admin/tamplates/footer_form');
        } else {
            $this->Anggota_model->ubahDataAnggota();
            $this->session->set_flashdata('pesan', 'Diubah');
            redirect('Anggota');
        }
    }

    public function hapus($id)
    {
        $this->Anggota_model->hapusDataAnggota($id);
        $this->session->set_flashdata('pesan', 'Dihapus');
        redirect('Anggota');
    }

    public function printAnggota()
    {
        $data['judul'] = "Data Anggota Perpustakaan SMA 1 Keruak";

        $data['anggota'] = $this->Anggota_model->getAllAnggota();
        $this->load->view('admin/tamplates/header_print', $data);
        $this->load->view('admin/anggota/print', $data);
        $this->load->view('admin/tamplates/footer_print');
    }

    public function excel()
    {
        $data['anggota'] = $this->Anggota_model->getAllAnggota();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Perputakaan SMA 1 Keruak");
        $object->getProperties()->setLastModifiedBy("Perputakaan SMA 1 Keruak");
        $object->getProperties()->setTitle("Daftar Anggota");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Nama Anggota');
        $object->getActiveSheet()->setCellValue('C1', 'Nis/Nip');
        $object->getActiveSheet()->setCellValue('E1', 'Alamat');
        $object->getActiveSheet()->setCellValue('D1', 'Jenis Kelamin');
        $object->getActiveSheet()->setCellValue('F1', 'Status');
        $object->getActiveSheet()->setCellValue('G1', 'No.telephone');

        $baris = 2;
        $no = 1;

        foreach ($data['anggota'] as $peranggota) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $peranggota['nama']);
            $object->getActiveSheet()->setCellValue('C' . $baris, $peranggota['nis_nip']);
            $object->getActiveSheet()->setCellValue('D' . $baris, $peranggota['alamat']);
            $object->getActiveSheet()->setCellValue('E' . $baris, $peranggota['jenis_kelamin']);
            $object->getActiveSheet()->setCellValue('F' . $baris, $peranggota['status']);
            $object->getActiveSheet()->setCellValue('G' . $baris, $peranggota['no_hp']);
            $baris++;
        }

        $filename = "Data Anggota" . '.xlsx';
        $object->getActiveSheet()->setTitle("Data Anggota");

        header('Content-Type : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
}
