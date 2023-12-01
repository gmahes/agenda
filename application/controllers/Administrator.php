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
            redirect('auth/login');
        } elseif ($this->session->has_userdata('username') && $this->session->userdata('role') == '0') {
            redirect('welcome/not_authorized');
            die;
        }
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => $this->db->get('user_details'),
            'agenda' => $this->db->get_where('agenda_details', ['is_verified' => 'accepted'])->result_array(),
            'agenda_count' => $this->db->get_where('agenda_details', ['is_verified' => 'not_verified'])->num_rows(),
            'agenda_approve' => $this->db->get_where('agenda_details', ['is_verified' => 'accepted'])->num_rows(),
            'agenda_declined' => $this->db->get_where('agenda_details', ['is_verified' => 'declined'])->num_rows(),
        ];
        $this->load->view('administrators/templates/header', $data);
        $this->load->view('administrators/templates/topbar');
        $this->load->view('administrators/templates/sidebar');
        $this->load->view('administrators/index');
        $this->load->view('administrators/templates/footer');
    }
    public function employees()
    {
        $all_user = $this->db->get('user_details')->result_array();
        $data = [
            'title' => 'Dashboard',
            'user' => $all_user
        ];
        $this->load->view('administrators/templates/header', $data);
        $this->load->view('administrators/templates/topbar');
        $this->load->view('administrators/templates/sidebar');
        $this->load->view('administrators/employees', $data);
        $this->load->view('administrators/templates/footer');
    }
    public function create()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user_details.username]|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim');
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false && $_POST) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">' . validation_errors() . '</div>');
            redirect('administrator/employees');
        }
        if ($_POST) {
            $data = [
                'username'   => $this->input->post('username'),
                'password'   => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'first_name' => $this->input->post('first_name') . ' ',
                'last_name'  => $this->input->post('last_name'),
                'role'       => $this->input->post('role')
            ];
            $this->db->insert('user_details', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Tambah karyawan baru berhasil!</div>');
        }
        redirect('administrator/employees');
    }
    public function edit()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim');
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false and $_POST) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">' . validation_errors() . '</div>');
            redirect('administrator/employees');
        }
        if ($_POST) {
            $data = [
                'id'         => $this->input->post('id'),
                'username'   => $this->input->post('username'),
                'password'   => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'first_name' => $this->input->post('first_name') . ' ',
                'last_name'  => $this->input->post('last_name'),
                'role'       => $this->input->post('role')
            ];
            $data_agenda = [
                'agenda_taskperson' => $this->input->post('first_name') . $this->input->post('last_name')
            ];
            $this->db->where('id', $this->input->post('id'))->update('user_details', $data);
            $this->db->where('user_id', $this->input->post('id'))->update('agenda_details', $data_agenda);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Edit karyawan berhasil!</div>');
        }
        redirect('administrator/employees');
    }
    public function delete()
    {
        if ($_POST) {
            $id = $this->input->post('id');
            $this->db->delete('user_details', ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Hapus karyawan berhasil!</div>');
        }
        redirect('administrator/employees');
    }
    public function agenda()
    {
        $all_agenda = $this->db->get_where('agenda_details', ['is_verified' => 'not_verified'])->result_array();
        $data = [
            'title' => 'Dashboard',
            'agenda' => $all_agenda,
            'taskperson' => $this->db->select('first_name, last_name')->from('user_details')->join('agenda_details', 'user_details.id = agenda_details.agenda_taskperson')->get()->result_array()
        ];
        $this->load->view('administrators/templates/header', $data);
        $this->load->view('administrators/templates/topbar');
        $this->load->view('administrators/templates/sidebar');
        $this->load->view('administrators/agenda', $data);
        $this->load->view('administrators/templates/footer');
    }
    public function approve()
    {
        if ($_POST) {
            $id = $this->input->post('id');
            $this->db->where('id', $id)->update('agenda_details', ['is_verified' => 'accepted']);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Agenda berhasil diverifikasi!</div>');
        }
        redirect('administrator/agenda');
    }
    public function reject()
    {
        if ($_POST) {
            $id = $this->input->post('id');
            $this->db->where('id', $id)->update('agenda_details', ['is_verified' => 'declined']);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Agenda berhasil ditolak!</div>');
        }
        redirect('administrator/agenda');
    }
    public function passwd()
    {
        $this->form_validation->set_rules('OldPassword', 'Old Password', 'required|trim');
        $this->form_validation->set_rules('NewPassword', 'New Password', 'required|trim|matches[NewPassword1]');
        $this->form_validation->set_rules('NewPassword1', 'Confirm New Password', 'required|trim|matches[NewPassword]');
        if ($this->form_validation->run() == false && $_POST) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">' . validation_errors() . '</div>');
            redirect('administrator');
        }
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
            $id = $this->input->post('id');
            $this->db->where('id', $id)->update('user_details', ['password' => password_hash('12345678', PASSWORD_DEFAULT)]);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Password berhasil direset!</div>');
        }
        redirect('administrator/employees');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
