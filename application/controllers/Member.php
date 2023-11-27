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
            AND TABLE_NAME = "agenda_details"')->result_array(),
            'dump' => $this->db->get('agenda_details')->result_array()
        ];
        $this->load->view('members/templates/header', $data);
        $this->load->view('members/templates/topbar');
        $this->load->view('members/templates/sidebar');
        $this->load->view('members/agenda', $data);
        $this->load->view('members/templates/footer');
    }
    public function create()
    {
        $this->form_validation->set_rules('Date', 'Date', 'required|trim');
        $this->form_validation->set_rules('Time', 'Time', 'required|trim');
        $this->form_validation->set_rules('Time1', 'Time1', 'required|trim');
        $this->form_validation->set_rules('AgendaPlace', 'Agenda Place', 'required|trim');
        $this->form_validation->set_rules('AgendaProgram', 'Agenda Program', 'required|trim');
        if ($this->form_validation->run() == false && $_POST) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">' . validation_errors() . '</div>');
            redirect('member/agenda');
        }
        if ($_POST) {
            if ($this->input->post('Date') == $this->db->get_where('agenda_details', ['agenda_date' => $this->input->post('Date')])->row_array()['agenda_date']) {
                if ($this->input->post('Time') . ':00' == $this->db->get_where('agenda_details', ['agenda_start' => $this->input->post('Time1') . ':00'])->row_array()['agenda_start'] && $this->input->post('Time1') . ':00' == $this->db->get_where('agenda_details', ['agenda_start' => $this->input->post('Time1') . ':00'])->row_array()['agenda_end']) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">Agenda yang anda buat bentrok dengan agenda lain!</div>');
                    redirect('member/agenda');
                } else {
                    $data = [
                        'user_id'  => $this->input->post('user_id'),
                        'agenda_number'   => $this->input->post('AgendaNumber'),
                        'agenda_date'   => $this->input->post('Date'),
                        'agenda_start' => $this->input->post('Time') . ':00',
                        'agenda_end' => $this->input->post('Time1') . ':00',
                        'agenda_place'  => $this->input->post('AgendaPlace'),
                        'agenda_program'       => $this->input->post('AgendaProgram'),
                        'agenda_taskperson'       => $this->input->post('AgendaTaskperson'),
                    ];
                    $this->db->insert('agenda_details', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Tambah agenda baru berhasil!</div>');
                }
            }
        }
        redirect('member/agenda');
    }
    public function edit()
    {
        $data = [
            'agenda_number'   => $this->input->post('AgendaNumber'),
            'agenda_date'   => $this->input->post('Date'),
            'agenda_start' => $this->input->post('Time'),
            'agenda_end' => $this->input->post('Time1'),
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
        $this->form_validation->set_rules('OldPassword', 'Old Password', 'required|trim');
        $this->form_validation->set_rules('NewPassword', 'New Password', 'required|trim|matches[NewPassword1]');
        $this->form_validation->set_rules('NewPassword1', 'Confirm New Password', 'required|trim|matches[NewPassword]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">' . validation_errors() . '</div>');
            redirect('member');
        }
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
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
