<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function index()
    {
        $data = array(
            'title'     =>  'About',
            'isi'       =>  'about/list'
        );

        $this->load->view('layout/wrapper', $data, FALSE);
    }

}

/* End of file About.php */
