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
        $denda = ($diff->d) * 1000;
        if ($waktuSekarangStr < $waktuPinjamStr) {
            $dendaBuku = 0;
        } elseif ($waktuSekarangStr == $waktuPinjamStr) {
            $dendaBuku = 0;
        } elseif ($waktuSekarangStr > $waktuPinjamStr) {
            $dendaBuku = $denda;
        }

        $this->Buku_dipinjam_model->tambahBukuKembali($id, $dendaBuku);
        $this->Buku_dipinjam_model->ubahDataBuku($getBuku['id'],$pinjam['jumlah_buku'],$getBuku['jumlah_buku']);
        $this->session->set_flashdata('pesan', 'Dikembalikan');

        $this->Buku_dipinjam_model->hapusDataPinjam($id);
        redirect('Buku_dipinjam');
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


    public function excel()
    {
        $data['pinjam'] = $this->Buku_dipinjam_model->getAllPinjam();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Perputakaan SMA 1 Keruak");
        $object->getProperties()->setLastModifiedBy("Perputakaan SMA 1 Keruak");
        $object->getProperties()->setTitle("Daftar Pinjam");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Nama Anggota');
        $object->getActiveSheet()->setCellValue('C1', 'Judul Buku');
        $object->getActiveSheet()->setCellValue('E1', 'NIS/NIP');
        $object->getActiveSheet()->setCellValue('D1', 'Waktu Pinjam');
        $object->getActiveSheet()->setCellValue('F1', 'Waktu Kembali');
        $object->getActiveSheet()->setCellValue('G1', 'Jumalah Buku');

        $baris = 2;
        $no = 1;

        foreach ($data['pinjam'] as $p) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $p['nama_anggota']);
            $object->getActiveSheet()->setCellValue('C' . $baris, $p['judul_buku']);
            $object->getActiveSheet()->setCellValue('D' . $baris, $p['nis_nip']);
            $object->getActiveSheet()->setCellValue('E' . $baris, $p['waktu_pinjam']);
            $object->getActiveSheet()->setCellValue('F' . $baris, $p['waktu_kembali']);
            $object->getActiveSheet()->setCellValue('G' . $baris, $p['jumlah_buku']);
            $baris++;
        }

        $filename = "Data Pinjam Buku" . '.xlsx';
        $object->getActiveSheet()->setTitle("Data Pinjam Buku");

        header('Content-Type : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
}
