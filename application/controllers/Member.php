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
            echo "Anda tidak memiliki hak akses terhadap halaman ini!";
            die;
        }
    }
    public function index()
    {
        echo "tampilan member";
        var_dump($this->session->userdata('role'));
    }
}
