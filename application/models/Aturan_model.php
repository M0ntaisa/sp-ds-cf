<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aturan_model extends CI_Model {

    // fungsi get data aturan
    public function getAturan()
    {

        $query = $this->db->query("SELECT
            tb_aturan.id_aturan,
            tb_aturan.cf,
            tb_aturan.mb,
            tb_aturan.md,
            tb_aturan.id_penyakit,
            tb_aturan.id_gejala,
            tb_gejala.nama_gejala,
            tb_penyakit.nama_penyakit 
        FROM
            tb_aturan
            INNER JOIN tb_gejala ON tb_aturan.id_gejala = tb_gejala.id_gejala
            INNER JOIN tb_penyakit ON tb_aturan.id_penyakit = tb_penyakit.id_penyakit
        ORDER BY
            tb_aturan.id_aturan ASC"
        );
        
        return $query->result_array();

    }

    // fungsi get data aturan ds
    public function getAturanDS()
    {

        $query = $this->db->query("SELECT
            tb_aturan_ds.id_aturan,
            tb_aturan_ds.cf,
            tb_aturan_ds.id_penyakit,
            tb_aturan_ds.id_gejala,
            tb_gejala.nama_gejala,
            tb_penyakit.nama_penyakit 
        FROM
            tb_aturan_ds
            INNER JOIN tb_gejala ON tb_aturan_ds.id_gejala = tb_gejala.id_gejala
            INNER JOIN tb_penyakit ON tb_aturan_ds.id_penyakit = tb_penyakit.id_penyakit"
        );
        
        return $query->result_array();

    }

    // fungsu menambah aturan
    public function tambahAturan($data)
    {
        $insert = $this->db->insert('tb_aturan', $data);
    }

    // fungsi get data aturan cf
    public function getAturanCF()
    {
        
    }

    // fungsi edit nilai aturan
    public function editNilaiAturan($data)
    {
        $this->db->where('id_aturan', $data['id_aturan']);
        $update = $this->db->update('tb_aturan', $data);
    }

    // fungsi hapus Penyakit / Hama
    public function hapusAturan($id_aturan)
    {
        $this->db->delete('tb_aturan', ['id_aturan' => $id_aturan]);
    }
    

}

/* End of file Aturan_model.php */
