<?php

class Buku_dipinjam_model extends CI_model
{
    public function getAllPinjam()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('pinjam')->result_array();
    }

    public function getPinjam($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_anggota', $keyword);
            $this->db->or_like('judul_buku', $keyword);
            $this->db->or_like('nis_nip', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('pinjam', $limit, $start)->result_array();
    }

    public function hapusDataPinjam($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pinjam');
    }

    public function tambahBukuKembali($id, $denda, $statusPinjaman)
    {
        $pinjam = $this->getPinjamById($id);
        $tanggal = date("Y-m-d");
        $data = array(
            'nama_anggota' => $pinjam['nama_anggota'],
            'judul_buku' => $pinjam['judul_buku'],
            'nis_nip' => $pinjam['nis_nip'],
            'waktu_pinjam' => $pinjam['waktu_pinjam'],
            'batas_pinjam' => $pinjam['waktu_kembali'],
            'waktu_kembali' => $tanggal,
            'jumlah_buku' => $pinjam['jumlah_buku'],
            'denda' => $denda,
            'status_pinjaman' => $statusPinjaman
        );
        // var_dump($data);

        $this->db->insert('bukukembali', $data);
    }

    public function getPinjamById($id)
    {
        return $this->db->get_where('pinjam', ['id' => $id])->row_array();
    }

    public function cariDataPinjam()
    {
        $keyword = $this->input->post('keyword');

        $this->db->like('nama_anggota', $keyword);
        // $this->db->or_like('nis_nip', $keyword);
        // $this->db->or_like('alamat', $keyword);
        // $this->db->or_like('jeni_kelamin', $keyword);
        // $this->db->or_like('status', $keyword);
        // $this->db->or_like('no_hp', $keyword);

        return $this->db->get('pinjam')->result_array();
    }

    public function jumlahDataPinjam()
    {
        return $this->db->get('pinjam')->num_rows();
    }

    public function ubahDataBuku($id,$jumlah_pinjam,$getJumlahBuku)
    {
            $kembali_buku = $jumlah_pinjam + $getJumlahBuku;
            $data = array(
                'jumlah_buku' => $kembali_buku
            );

            $this->db->where('id', $id);
            $this->db->update('buku', $data);
            
    }
}
