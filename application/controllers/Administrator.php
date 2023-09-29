<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        $this->load->view('administrators/templates/header', $data);
        $this->load->view('administrators/templates/topbar');
        $this->load->view('administrators/templates/sidebar');
        $this->load->view('administrators/index');
        $this->load->view('administrators/templates/footer');
    }
}
