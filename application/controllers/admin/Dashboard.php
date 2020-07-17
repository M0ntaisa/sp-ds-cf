<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
        $data = [
            'subtitle'  => "Dashboard",
            'isi'   =>  "admin/dashboard/list"
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

}

/* End of file Dashboard.php */
