<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                Anda belum login!</div>');
            redirect('auth/login');
        } elseif ($this->session->has_userdata('username') && $this->session->userdata('role') == '1') {
            redirect('welcome/not_authorized');
            die;
        }
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => $this->db->get('user_details')
        ];
        $this->load->view('members/templates/header', $data);
        $this->load->view('members/templates/topbar');
        $this->load->view('members/templates/sidebar');
        $this->load->view('members/index');
        $this->load->view('members/templates/footer');
    }
    public function agenda()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        $this->load->view('members/templates/header', $data);
        $this->load->view('members/templates/topbar');
        $this->load->view('members/templates/sidebar');
        $this->load->view('members/agenda');
        $this->load->view('members/templates/footer');
    }
}
