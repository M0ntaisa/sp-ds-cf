<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // proteksi halaman
        // $this->auth->cek_login();
        // load model
        $this->load->model('Penyakit_model');
        $this->load->model('Gejala_model');
        $this->load->model('Konsultasi_model');
    }

    public function index()
    {
        $gejala = $this->Gejala_model->getGejala();
        $penyakit = $this->Penyakit_model->getPenyakit();

        $data = [
            'title' =>  "Konsultasi",
            'gejala'    =>  $gejala,
            'penyakit'  =>  $penyakit,
            'isi'   =>  "user/konsultasi"
        ];

        $this->load->view('layout/wrapper', $data, FALSE);
        

    }

    public function Proses()
    {
        // $gejala = $this->input->post('gejala[]');
        // var_dump($gejala);
        // echo count($gejala);

        if(isset($_POST['gejala'])){

            if(count($_POST['gejala'])<2){
                $this->session->set_flashdata('gagal', 'Metode Dempster Shafer membutuhkan setidaknya 2 gejala untuk diproses!');
                // redirect(base_url('konsultasi'), 'refresh');
                $data = [
                    'title' =>  "Hasil Konsultasi",
                    'isi'   =>  "user/hasil_konsultasi"
                ];
    
                $this->load->view('layout/wrapper', $data, FALSE);
            }else{
                // $this->Konsultasi_model->proses();
                // $this->Konsultasi_model->prosesCF();
                $data = [
                    'title' =>  "Hasil Konsultasi",
                    'isi'   =>  "user/hasil_konsultasi"
                ];
    
                $this->load->view('layout/wrapper', $data, FALSE);
                
            }   

        } else {
            $this->session->set_flashdata('warning', 'Anda Belum Memilih Gejalah');
            redirect(base_url('konsultasi'), 'refresh');
        }
        
    }

}

/* End of file Konsultasi.php */
