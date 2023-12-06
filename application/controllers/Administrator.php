<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                Anda belum login!</div>');
            redirect('auth');
        } elseif ($this->session->has_userdata('username') && $this->session->userdata('role') == '0') {
            redirect('welcome/not_authorized');
            die;
        }
    }
    public function index()
    {
        $data = data_index();
        $this->load->view('administrators/templates/header', $data);
        $this->load->view('administrators/templates/topbar');
        $this->load->view('administrators/templates/sidebar');
        $this->load->view('administrators/index');
        $this->load->view('administrators/templates/footer');
    }
    public function employees()
    {
        $data = data_employees();
        $this->load->view('administrators/templates/header', $data);
        $this->load->view('administrators/templates/topbar');
        $this->load->view('administrators/templates/sidebar');
        $this->load->view('administrators/employees', $data);
        $this->load->view('administrators/templates/footer');
    }
    public function create()
    {
        create_validation();
        if ($_POST) {
            $this->Administrator_model->create_user();
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Tambah karyawan baru berhasil!</div>');
        }
        redirect('administrator/employees');
    }
    public function edit()
    {
        edit_validation();
        if ($_POST) {
            $this->Administrator_model->edit_user();
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Edit karyawan berhasil!</div>');
        }
        redirect('administrator/employees');
    }
    public function delete()
    {
        if ($_POST) {
            $this->Administrator_model->delete_user();
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Hapus karyawan berhasil!</div>');
        }
        redirect('administrator/employees');
    }
    public function agenda()
    {
        $data = data_agenda();
        $this->load->view('administrators/templates/header', $data);
        $this->load->view('administrators/templates/topbar');
        $this->load->view('administrators/templates/sidebar');
        $this->load->view('administrators/agenda', $data);
        $this->load->view('administrators/templates/footer');
    }
    public function history()
    {
        $data = history_agenda();
        $this->load->view('administrators/templates/header', $data);
        $this->load->view('administrators/templates/topbar');
        $this->load->view('administrators/templates/sidebar');
        $this->load->view('administrators/agenda_history', $data);
        $this->load->view('administrators/templates/footer');
    }
    public function approve()
    {
        if ($_POST) {
            $this->Administrator_model->approve_agenda();
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Agenda berhasil diverifikasi!</div>');
        }
        redirect('administrator/agenda');
    }
    public function reject()
    {
        reject_validation();
        if ($_POST) {
            $this->Administrator_model->reject_agenda();
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Agenda berhasil ditolak!</div>');
        }
        redirect('administrator/agenda');
    }
    public function passwd()
    {
        changepasswordadmin_validation();
        if ($_POST) {
            $user = $this->db->get_where('user_details', ['id' => $this->session->userdata('id')])->row_array();
            $old_password = $this->input->post('OldPassword');
            $new_password = $this->input->post('NewPassword');
            if (!password_verify($old_password, $user['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">Password lama salah!</div>');
                redirect('administrator');
            } else {
                $this->db->where('id', $this->session->userdata('id'))->update('user_details', ['password' => password_hash($new_password, PASSWORD_DEFAULT)]);
                $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Password berhasil diganti!</div>');
            }
        }
        redirect('administrator');
    }
    public function reset()
    {
        if ($_POST) {
            $this->Administrator_model->reset_password();
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Password berhasil direset!</div>');
        }
        redirect('administrator/employees');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
