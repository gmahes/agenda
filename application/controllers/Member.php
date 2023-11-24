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
            'agenda' => $this->db->get('agenda_details')->result_array()
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
            'agenda' => $this->db->get_where('agenda_details', ['user_id' => $this->session->userdata('id')])->result_array(),
            'count' => $this->db->query('SELECT AUTO_INCREMENT
            FROM information_schema.TABLES
            WHERE TABLE_SCHEMA = "freedb_agenda_db"
            AND TABLE_NAME = "agenda_details"')->result_array()
        ];
        $this->load->view('members/templates/header', $data);
        $this->load->view('members/templates/topbar');
        $this->load->view('members/templates/sidebar');
        $this->load->view('members/agenda');
        $this->load->view('members/templates/footer');
    }
    public function create()
    {
        $data = [
            'user_id'  => $this->input->post('user_id'),
            'agenda_number'   => $this->input->post('AgendaNumber'),
            'agenda_date'   => $this->input->post('Date'),
            'agenda_time' => $this->input->post('Time'),
            'agenda_place'  => $this->input->post('AgendaPlace'),
            'agenda_program'       => $this->input->post('AgendaProgram'),
            'agenda_taskperson'       => $this->input->post('AgendaTaskperson'),
        ];
        $this->db->insert('agenda_details', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Tambah karyawan baru berhasil!</div>');
        redirect('member/agenda');
    }
    public function edit()
    {
        $data = [
            'agenda_number'   => $this->input->post('AgendaNumber'),
            'agenda_date'   => $this->input->post('Date'),
            'agenda_time' => $this->input->post('Time'),
            'agenda_place'  => $this->input->post('AgendaPlace'),
            'agenda_program'       => $this->input->post('AgendaProgram'),
            'agenda_taskperson'       => $this->input->post('AgendaTaskperson'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('agenda_details', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Edit agenda berhasil!</div>');
        redirect('member/agenda');
    }
    public function delete()
    {
        if ($_POST) {
            $id = $this->input->post('id');
            $this->db->delete('agenda_details', ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Hapus agenda berhasil!</div>');
        }
        redirect('member/agenda');
    }
    public function passwd()
    {
        $this->form_validation->set_rules('OldPassword', 'Old Password', 'required');
        $this->form_validation->set_rules('NewPassword', 'New Password', 'required');
        $this->form_validation->set_rules('NewPassword1', 'Confirm New Password', 'required|matches[NewPassword]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">Mohon isi semua Field</div>');
            redirect('member');
        } else {
            $old = $this->input->post('OldPassword');
            $new = $this->input->post('NewPassword');
            $new1 = $this->input->post('NewPassword1');
            $user = $this->db->get_where('user_details', ['id' => $this->session->userdata('id')])->row_array();

            if (password_verify($old, $user['password'])) {
                $data = [
                    'password' => password_hash($new, PASSWORD_DEFAULT)
                ];
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('user_details', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Password Berhasil Diubah!</div>');
                redirect('member');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">Password Lama Salah!</div>');
                redirect('member');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
