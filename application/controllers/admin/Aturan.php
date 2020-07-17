<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aturan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // proteksi halaman
        // $this->auth->cek_login();
        // load model
        $this->load->model('Gejala_model');
        $this->load->model('Penyakit_model');
        $this->load->model('Aturan_model');
    }

    public function index()
    {
        $gejala = $this->Gejala_model->getGejala();
        $penyakit = $this->Penyakit_model->getPenyakit();
        $aturan = $this->Aturan_model->getAturan();

        $data = [
            'subtitle'  => "Data Aturan",
            'gejala' => $gejala,
            'penyakit' => $penyakit,
            'aturan' => $aturan,
            'isi'   =>  "admin/aturan/list"
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function aturan_ds()
    {
        $gejala = $this->Gejala_model->getGejala();
        $penyakit = $this->Penyakit_model->getPenyakit();
        $ds = $this->Aturan_model->getAturanDS();

        $data = [
            'subtitle'  => "Data Aturan Dempster Shafer",
            'aturan_ds' => $ds,
            'gejala' => $gejala,
            'penyakit' => $penyakit,
            'isi' => "admin/aturan/ds/list"
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        
    }

    public function aturan_cf()
    {
        $ds = $this->Aturan_model->getAturanCF();

        $data = [
            'subtitle'  => "Data Aturan Certainty Factor",
            'aturan_ds' => $ds,
            'isi' => "admin/aturan/cf/list"
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        
    }

    public function tambah_aturan()
    {
        $id_gejala = $this->input->post('id_gejala');
        $id_penyakit = $this->input->post('id_penyakit');

        if ($id_gejala == "" || $id_penyakit == "") {
            $this->session->set_flashdata('gagal', 'anda belum memilih gejala atau penyakit.');
            redirect(base_url('admin/aturan'), 'refresh');
        } else {
            $data = [
                'id_gejala' => $id_gejala,
                'id_penyakit' => $id_penyakit
            ];

            $this->Aturan_model->tambahAturan($data);
            
            // set flashdata
            $this->session->set_flashdata('sukses', 'Data Aturan telah ditambahkan.');
            redirect(base_url('admin/aturan'), 'refresh');
        }
    }

    public function tambah_aturan_ds()
    {
        
    }

    public function tambah_aturan_cf()
    {
        
    }

    public function edit_nilai($id_aturan)
    {
        $data = [
            'id_aturan' => $id_aturan,
            'cf' => $this->input->post('nilai_ds'),
            'mb' => $this->input->post('nilai_mb'),
            'md' => $this->input->post('nilai_md')
        ];

        $this->Aturan_model->editNilaiAturan($data);

        // set flashdata
        $this->session->set_flashdata('sukses', 'Data Aturan telah diedit.');
        redirect(base_url('admin/aturan'), 'refresh');
    }

    public function hapus_aturan($id_aturan)
    {
        // proses hapus aturan
        $this->Aturan_model->hapusAturan($id_aturan);
        $this->session->set_flashdata('sukses', 'Data Aturan Telah Dihapus');
        redirect(base_url('admin/aturan'), 'refresh');
    }

}

/* End of file Aturan.php */
