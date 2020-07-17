<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // proteksi halaman
        // $this->auth->cek_login();
        // load model
        $this->load->model('Penyakit_model');
    }

    public function index()
    {
        $penyakit = $this->Penyakit_model->getPenyakit();

        $data = [
            'subtitle'  => "Data Penyakit / Hama",
            'penyakit' => $penyakit,
            'isi'   =>  "admin/penyakit/list"
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function tambah_penyakit()
    {
        if ($this->input->post('nama_penyakit') == null) {
            $this->session->set_flashdata('gagal', 'form penyakit / hama tidak boleh kosong.');
            redirect(base_url('admin/penyakit'), 'refresh');
        } else {
            $data = [
                'kode_penyakit' => $this->input->post('kode_penyakit'),
                'nama_penyakit' => $this->input->post('nama_penyakit'),
                'ket' => $this->input->post('ket')
            ];

            $this->Penyakit_model->tambahPenyakit($data);

            // set flashdata
            $this->session->set_flashdata('sukses', 'Data Penyakit / Hama telah ditambahkan.');
            redirect(base_url('admin/penyakit'), 'refresh');
        }
    }

    public function edit_penyakit()
    {
        if ($this->input->post('nama_penyakit') == null) {
            $this->session->set_flashdata('gagal', 'form penyakit / hama tidak boleh kosong.');
            redirect(base_url('admin/penyakit'), 'refresh');
        } else {
            $data = [
                'kode_penyakit' => $this->input->post('kode_penyakit'),
                'nama_penyakit' => $this->input->post('nama_penyakit'),
                'ket' => $this->input->post('ket')
            ];

            $this->Penyakit_model->editPenyakit($data);

            // set flashdata
            $this->session->set_flashdata('sukses', 'Data Penyakit / Hama telah diedit.');
            redirect(base_url('admin/penyakit'), 'refresh');
        }
    }

    public function hapus_penyakit($kode_penyakit)
    {
        // proses hapus Penyakit / Hama
        $this->Penyakit_model->hapusPenyakit($kode_penyakit);
        $this->session->set_flashdata('sukses', 'Data Penyakit / Hama Telah Dihapus');
        redirect(base_url('admin/penyakit'), 'refresh');
    }

}

/* End of file Penyakit.php */
