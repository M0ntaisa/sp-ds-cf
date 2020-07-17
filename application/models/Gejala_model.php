<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala_model extends CI_Model {

    //Fungsi Lihat Data Gejala
    public function getGejala() {
        return $this->db->get('tb_gejala')->result_array();
    }

    // fungsi tambah gejala
    public function tambahGejala($data)
    {
        //Cek apakah ada Suplier dengan Kode sama
        $filter = $this->db->select('*')->from('tb_gejala')->where('kode_gejala', $data['kode_gejala'])->get()->num_rows();
        if ($filter < 1) {
            $insert = $this->db->insert('tb_gejala', $data);
        } else {
            // set flashdata
            $this->session->set_flashdata('gagal', 'Data Suplier gagal ditambahkan.');
            redirect(base_url('admin/suplier'), 'refresh');
        }
    }

    // fungsi edit gejala
    public function editGejala($data)
    {
        $this->db->where('kode_gejala', $data['kode_gejala']);
        $update = $this->db->update('tb_gejala', $data);
    }

    // fungsi hapus gejala
    public function hapusGejala($kode_gejala)
    {
        $this->db->delete('tb_gejala', ['kode_gejala' => $kode_gejala]);
    }

}

/* End of file Gejala_model.php */
