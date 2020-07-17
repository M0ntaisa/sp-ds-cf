<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        
    }
    

    public function index()
    {
        
    }

    public function Login()
    {
        $data = array(
            'title'     => "Login"
        );

        $valid = $this->form_validation;
        $valid->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email harus diisi',
            'valid_email' => 'Format email anda tidak valid'
        ]);
        $valid->set_rules('password', 'Password', 'required|trim',[
            'required' => 'Password harus diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('login/list', $data, FALSE);
        
        } else {
            // validation
            $this->_login();
        }
    
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            // usernya ada
            if ($user['status'] == 1) {
                // jika user aktif
                // cek password
                if (password_verify($password, $user['password'])) {
                    //  jika password benar
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    
                    if ($data['role_id'] == 1) {
                        // jika admin
                        redirect('admin/dashboard','refresh');
                    } else {
                        // jika user
                        redirect('user','refresh');
                    }
                    
                } else {
                    // jika password salah
                    $this->session->set_flashdata('pesan', '<script>alert("Gagal masuk! Password anda salah.")</script>');
                
                    redirect('auth/login','refresh');
                }
                
            } else {
                // jika user belum aktif
                $this->session->set_flashdata('pesan', '<script>alert("Gagal masuk! Akun anda belum diverifikasi.")</script>');
                
                redirect('auth/login','refresh');
            }
        } else {
            // usernya tidak ada
            $this->session->set_flashdata('pesan', '<script>alert("Gagal masuk! Anda belum terdaftar sebagai user.")</script>');
            
            redirect('auth/login','refresh');
            
        }
        
    }

    public function Register()
    {
        $data = array(
            'title'     =>  'Registrasi'
        );

        $valid = $this->form_validation;
        $valid->set_rules('nama', 'name', 'required|trim',[
            'required' => 'Nama harus diisi.'
        ]);
        $valid->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'required' => 'Email harus diisi',
            'valid_email' => 'Format email anda tidak valid.',
            'is_unique' => 'Email anda sudah terdaftar'
        ]);
        $valid->set_rules('password', 'Password', 'required|min_length[3]|matches[re_password]',[
            'required' => 'Password harus diisi',
            'matches' => 'Password tidak sama.',
            'min_length' => 'Password terlalu pendek.'
        ]);
        $valid->set_rules('re_password', 'Ulangi Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('regis/list', $data, FALSE);
        
        } else {
            
            $this->User_model->add_user();

            $this->session->set_flashdata('pesan', '<script>alert("Berhasil mendaftar. Silahkan verifikasi akun di email anda!")</script>');
            
            redirect('auth/login','refresh');
            
        }
    }

    public function verify()
    {
        $this->User_model->verify_user();
    }

    public function logout()
    {
        
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<script>alert("Anda telah logout!")</script>');
            
        redirect('auth/login','refresh');
        
    }

}

/* End of file Auth.php */
