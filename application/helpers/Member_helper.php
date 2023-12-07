<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('datamember_index')) {
    function datamember_index()
    {
        $ci = &get_instance();
        $data = [
            'title' => 'SIMARS | Dashboard',
            'agenda' => $ci->db->get('agenda_details')->result_array(),
            'agenda_count' => $ci->db->get_where('agenda_details', ['user_id' => $ci->session->userdata('id')])->num_rows(),
            'agenda_approve' => $ci->db->get_where('agenda_details', ['user_id' => $ci->session->userdata('id'), 'is_verified' => 'accepted'])->num_rows(),
            'agenda_reject' => $ci->db->get_where('agenda_details', ['user_id' => $ci->session->userdata('id'), 'is_verified' => 'declined'])->num_rows(),
            'agenda_scheduled' => $ci->db->get_where('agenda_details', ['is_verified' => 'accepted'])->result_array(),
        ];
        return $data;
    }
}

if (!function_exists('datamember_agenda')) {
    function datamember_agenda()
    {
        $ci = &get_instance();
        $data = [
            'title' => 'SIMARS | Pengajuan Agenda',
            'agenda' => $ci->db->get_where('agenda_details', ['user_id' => $ci->session->userdata('id')])->result_array(),
            'count' => $ci->db->query('SELECT AUTO_INCREMENT
            FROM information_schema.TABLES
            WHERE TABLE_SCHEMA = "freedb_agenda_db"
            AND TABLE_NAME = "agenda_details"')->result_array(),
        ];
        return $data;
    }
}

if (!function_exists('creatagenda_validation')) {
    function creatagenda_validation()
    {
        $ci = &get_instance();
        $ci->form_validation->set_rules('Date', 'Date', 'required|trim');
        $ci->form_validation->set_rules('Time', 'Time', 'required|trim');
        $ci->form_validation->set_rules('Time1', 'Time1', 'required|trim');
        $ci->form_validation->set_rules('AgendaPlace', 'Agenda Place', 'required');
        $ci->form_validation->set_rules('AgendaProgram', 'Agenda Program', 'required|trim');
        if ($ci->form_validation->run() == false && $_POST) {
            $ci->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">' . validation_errors() . '</div>');
            redirect('member/agenda');
        }
        return true;
    }
}

if (!function_exists('editagenda_validation')) {
    function editagenda_validation()
    {
        $ci = &get_instance();
        $ci->form_validation->set_rules('Date', 'Date', 'required|trim');
        $ci->form_validation->set_rules('Time', 'Time', 'required|trim');
        $ci->form_validation->set_rules('Time1', 'Time1', 'required|trim');
        $ci->form_validation->set_rules('AgendaPlace', 'Agenda Place', 'required');
        $ci->form_validation->set_rules('AgendaProgram', 'Agenda Program', 'required|trim');
        if ($ci->form_validation->run() == false && $_POST) {
            $ci->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">' . validation_errors() . '</div>');
            redirect('member/agenda');
        }
        return true;
    }
}

if (!function_exists('changepassword_validation')) {
    function changepassword_validation()
    {
        $ci = &get_instance();
        $ci->form_validation->set_rules('OldPassword', 'Old Password', 'required|trim');
        $ci->form_validation->set_rules('NewPassword', 'New Password', 'required|trim|matches[NewPassword1]');
        $ci->form_validation->set_rules('NewPassword1', 'Confirm New Password', 'required|trim|matches[NewPassword]');
        if ($ci->form_validation->run() == false) {
            $ci->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">' . validation_errors() . '</div>');
            redirect('member');
        }
        return true;
    }
}
