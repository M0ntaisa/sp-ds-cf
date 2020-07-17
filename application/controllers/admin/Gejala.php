<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // proteksi halaman
        // $this->auth->cek_login();
        // load model
        $this->load->model('Gejala_model');
    }

    public function index()
    {
        $gejala = $this->Gejala_model->getGejala();

        $data = [
            'subtitle'  => "Data Gejala",
            'gejala' => $gejala,
            'isi'   =>  "admin/gejala/list"
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function tambah_gejala()
    {
        if ($this->input->post('gejala') == null) {
            $this->session->set_flashdata('gagal', 'form gejala tidak boleh kosong.');
            redirect(base_url('admin/gejala'), 'refresh');
        } else {
            $data = [
                'kode_gejala' => $this->input->post('kode_gejala'),
                'nama_gejala' => $this->input->post('gejala')
            ];

            $this->Gejala_model->tambahGejala($data);

            // set flashdata
            $this->session->set_flashdata('sukses', 'Data Gejala telah ditambahkan.');
            redirect(base_url('admin/gejala'), 'refresh');
        }
    }

    public function edit_gejala()
    {
        if ($this->input->post('gejala') == null) {
            $this->session->set_flashdata('gagal', 'form gejala tidak boleh kosong.');
            redirect(base_url('admin/gejala'), 'refresh');
        } else {
            $data = [
                'kode_gejala' => $this->input->post('kode_gejala'),
                'nama_gejala' => $this->input->post('gejala')
            ];

            $this->Gejala_model->editGejala($data);

            // set flashdata
            $this->session->set_flashdata('sukses', 'Data Gejala telah diedit.');
            redirect(base_url('admin/gejala'), 'refresh');
        }
    }

    public function hapus_gejala($kode_gejala)
    {
        // proses hapus gejala
        $this->Gejala_model->hapusGejala($kode_gejala);
        $this->session->set_flashdata('sukses', 'Data Gejala Telah Dihapus');
        redirect(base_url('admin/gejala'), 'refresh');
    }

}

/* End of file Gejala.php */
