<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                Anda belum login!</div>');
            redirect('auth/login');
        } elseif ($this->session->userdata('username')) {
            if (!$this->session->userdata('role') == 1) {
                echo "anda tidak bisa mengakses halaman ini";
            }
        }
    }
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
    public function employees()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        $this->load->view('administrators/templates/header', $data);
        $this->load->view('administrators/templates/topbar');
        $this->load->view('administrators/templates/sidebar');
        $this->load->view('administrators/employees');
        $this->load->view('administrators/templates/footer');
    }
}
