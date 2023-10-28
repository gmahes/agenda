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
            'agenda' => $this->db->get('agenda_details')->result_array()
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
    public function delete()
    {
        if ($_POST) {
            $id = $this->input->post('id');
            $this->db->delete('agenda_details', ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Hapus agenda berhasil!</div>');
        }
        redirect('member/agenda');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
