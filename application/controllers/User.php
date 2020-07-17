<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index()
    {

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
        $data = [
            'title' =>  "Member | Home",
            'user'  =>  $user,
            'isi'   =>  "user/list"
        ];

        $this->load->view('layout/wrapper', $data, FALSE);
        
    }

}

/* End of file User.php */
