<?php 

class Anggota_model extends CI_model{
    public function getAllAnggota(){
        return $this->db->query("SELECT * FROM anggota
        ORDER BY id DESC")->result_array();
    }

    public function getAnggota($limit, $start, $keyword = null){
        if($keyword){
            $this->db->like('nama', $keyword);
            $this->db->or_like('nis_nip', $keyword);
            $this->db->or_like('jenis_kelamin', $keyword);
            $this->db->or_like('alamat', $keyword);
            $this->db->or_like('status', $keyword);
            $this->db->or_like('no_hp', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('anggota', $limit, $start)->result_array();
    }

    public function jumlahDataAnggota(){
        return $this->db->get('anggota')->num_rows();
    }

    public function tambahDataAnggota(){
        $data = array(
            'nama' => $this->input->post('nama', true),
            'nis_nip' => $this->input->post('nis_nip', true),
            'alamat' => $this->input->post('alamat', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'status' => $this->input->post('status', true),
            'no_hp' => $this->input->post('no_hp', true)
        );

        $this->db->insert('anggota', $data);
    }

    public function hapusDataAnggota($id){
        $this->db->where('id', $id);
        $this->db->delete('anggota');
    }

    public function getAnggotaById($id){
        return $this->db->get_where('anggota', ['id' => $id])->row_array();
    }

    public function ubahDataAnggota(){
        $data = array(
            'nama' => $this->input->post('nama', true),
            'nis_nip' => $this->input->post('nis_nip', true),
            'alamat' => $this->input->post('alamat', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'status' => $this->input->post('status', true),
            'no_hp' => $this->input->post('no_hp', true)
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('anggota', $data);
    }

    public function cariDataAnggota(){
        $keyword = $this->input->post('cari_data_anggota');

        $this->db->like('nama', $keyword);
        $this->db->or_like('nis_nip', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('jeni_kelamin', $keyword);
        $this->db->or_like('status', $keyword);
        $this->db->or_like('no_hp', $keyword);

        return $this->db->get('anggota')->result_array();
    }
}
?>