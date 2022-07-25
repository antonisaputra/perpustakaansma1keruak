<?php

class Admin_buku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_buku_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        if (!$this->session->userdata('nama_admin')) {
            redirect('Login');
        }
    }

    public function index()
    {

        $data['judul'] = "Admin Perpustakaan | Buku";
        // $data['buku'] = $this->Admin_buku_model->getAllBuku();
        $button = $this->input->post('submit');

        if (isset($button)) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('buku', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('buku');
        }


        $this->db->like('judul', $data['keyword']);
        $this->db->or_like('kategori', $data['keyword']);
        $this->db->or_like('tahun_terbit', $data['keyword']);
        $this->db->from('buku');
        $config['base_url'] = "http://localhost:8080/perpustakaan/Admin_buku/index";
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(3);
        $data['buku'] = $this->Admin_buku_model->getBuku($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('admin/tamplates/header', $data);
        $this->load->view('admin/buku/index', $data);
        $this->load->view('admin/tamplates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Admin Perpustakaan | Tambah Buku";
        $data['kategori'] = $data['kategori'] = $this->Admin_buku_model->getAllKategori();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|numeric');
        $this->form_validation->set_rules('jumlah_buku', 'Jumlah Buku', 'required|numeric');
        // $this->form_validation->set_rules('gambar_buku', 'Gambar Buku', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/tamplates/header_form', $data);
            $this->load->view('admin/buku/tambah', $data);
            $this->load->view('admin/tamplates/footer_form');
        } else {
            $this->Admin_buku_model->tambahDataBuku();
            $this->session->set_flashdata('pesan', 'Ditambah');
            redirect('Admin_buku');
        }
    }

    public function hapus($id)
    {
        $this->Admin_buku_model->hapusDataBuku($id);
        $this->session->set_flashdata('pesan', 'DiHapus');
        redirect('Admin_buku');
    }

    public function ubah($id)
    {
        $data['judul'] = "Admin Perpustakaan | Ubah Buku";
        $data['kategori'] = $this->Admin_buku_model->getAllKategori();

        $data['buku'] = $this->Admin_buku_model->getBukuById($id);
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|numeric');
        $this->form_validation->set_rules('jumlah_buku', 'Jumlah Buku', 'required|numeric');
        // $this->form_validation->set_rules('gambar_buku', 'Gambar Buku', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/tamplates/header_form', $data);
            $this->load->view('admin/buku/ubah', $data);
            $this->load->view('admin/tamplates/footer_form');
        } else {
            $this->Admin_buku_model->ubahDataBuku($id);
            $this->session->set_flashdata('pesan', 'Diubah');
            redirect('Admin_buku');
        }
    }

    public function detail($id)
    {
        $data['judul'] = "Admin Perputakaan | Detail";

        $data['buku'] = $this->Admin_buku_model->getBukuById($id);
        $this->load->view('admin/tamplates/header', $data);
        $this->load->view('admin/buku/detail', $data);
        $this->load->view('admin/tamplates/footer');
    }

    public function print_buku()
    {
        $data['judul'] = "Data Semua Buku";

        $data['buku'] = $this->Admin_buku_model->getAllBuku();
        $this->load->view('admin/tamplates/header_print', $data);
        $this->load->view('admin/buku/print', $data);
        $this->load->view('admin/tamplates/footer_print');
    }

    public function excel()
    {
        $data['anggota'] = $this->Admin_buku_model->getAllBuku();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Perputakaan SMA 1 Keruak");
        $object->getProperties()->setLastModifiedBy("Perputakaan SMA 1 Keruak");
        $object->getProperties()->setTitle("Daftar Buku");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Judul Buku');
        $object->getActiveSheet()->setCellValue('C1', 'Kategori');
        $object->getActiveSheet()->setCellValue('E1', 'Penulis');
        $object->getActiveSheet()->setCellValue('F1', 'Tahun Terbit');
        $object->getActiveSheet()->setCellValue('G1', 'Jumlah Buku');

        $baris = 2;
        $no = 1;

        foreach ($data['anggota'] as $peranggota) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $peranggota['judul']);
            $object->getActiveSheet()->setCellValue('C' . $baris, $peranggota['kategori']);
            $object->getActiveSheet()->setCellValue('D' . $baris, $peranggota['penulis']);
            $object->getActiveSheet()->setCellValue('F' . $baris, $peranggota['tahun_terbit']);
            $object->getActiveSheet()->setCellValue('G' . $baris, $peranggota['jumlah_buku']);
            $baris++;
        }

        $filename = "Data Buku" . '.xlsx';
        $object->getActiveSheet()->setTitle("Data Buku");

        header('Content-Type : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    public function kategori()
    {
        $data['judul'] = "Admin Perputakaan | Kategori Buku";
        $data['kategori'] = $this->Admin_buku_model->getAllKategori();

        if ($this->input->post('keyword-kategori')) {
            $data['kategori'] = $this->Admin_buku_model->cariKategoriBuku();
        }

        $this->load->view('admin/tamplates/header', $data);
        $this->load->view('admin/buku/kategori', $data);
        $this->load->view('admin/tamplates/footer');
    }

    public function tambahKategori()
    {
        $data['judul'] = "Admin Perpustakaan | Tambah Kategori Buku";


        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        // $this->form_validation->set_rules('gambar_buku', 'Gambar Buku', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/tamplates/header_form', $data);
            $this->load->view('admin/buku/tambah_kategori', $data);
            $this->load->view('admin/tamplates/footer_form');
        } else {
            $this->Admin_buku_model->tambahKategoriBuku();
            $this->session->set_flashdata('pesan', 'Ditambah');
            redirect('Admin_buku/kategori');
        }
    }

    public function hapusKategori($id)
    {
        $this->Admin_buku_model->hapusKategoriBuku($id);
        $this->session->set_flashdata('pesan', 'DiHapus');
        redirect('Admin_buku/kategori');
    }

    public function ubahKategori($id)
    {
        $data['judul'] = "Admin Perpustakaan | Ubah Kategori Buku";

        $data['kategori'] = $this->Admin_buku_model->getKategoriBukuById($id);
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        // $this->form_validation->set_rules('gambar_buku', 'Gambar Buku', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/tamplates/header_form', $data);
            $this->load->view('admin/buku/ubah_kategori', $data);
            $this->load->view('admin/tamplates/footer_form');
        } else {
            $this->Admin_buku_model->ubahKategoriBuku($id);
            $this->session->set_flashdata('pesan', 'Diubah');
            redirect('Admin_buku/kategori');
        }
    }
}
