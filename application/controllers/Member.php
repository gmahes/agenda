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
            redirect('auth');
        } elseif ($this->session->has_userdata('username') && $this->session->userdata('role') == '1') {
            redirect('welcome/not_authorized');
            die;
        }
    }
    public function index()
    {
        $data = datamember_index();
        $this->load->view('members/templates/header', $data);
        $this->load->view('members/templates/topbar');
        $this->load->view('members/templates/sidebar');
        $this->load->view('members/index');
        $this->load->view('members/templates/footer');
    }
    public function agenda()
    {
        $data = datamember_agenda();
        $this->load->view('members/templates/header', $data);
        $this->load->view('members/templates/topbar');
        $this->load->view('members/templates/sidebar');
        $this->load->view('members/agenda', $data);
        $this->load->view('members/templates/footer');
    }
    public function create()
    {
        creatagenda_validation();
        if ($_POST) {
            $this->Member_model->create_agenda();
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Tambah agenda baru berhasil!</div>');
        }
        redirect('member/agenda');
    }
    public function edit()
    {
        editagenda_validation();
        if ($_POST) {
            $this->Member_model->edit_agenda();
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Edit agenda berhasil!</div>');
        }
        redirect('member/agenda');
    }
    public function delete()
    {
        if ($_POST) {
            $this->Member_model->delete_agenda();
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Hapus agenda berhasil!</div>');
        }
        redirect('member/agenda');
    }
    public function passwd()
    {
        changepassword_validation();
        if ($_POST) {
            $user = $this->db->get_where('user_details', ['id' => $this->session->userdata('id')])->row_array();
            $old_password = $this->input->post('OldPassword');
            $new_password = $this->input->post('NewPassword');
            if (!password_verify($old_password, $user['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">Password lama salah!</div>');
                redirect('member');
            } else {
                $this->db->where('id', $this->session->userdata('id'))->update('user_details', ['password' => password_hash($new_password, PASSWORD_DEFAULT)]);
                $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Password berhasil diganti!</div>');
                redirect('member');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
