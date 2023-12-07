<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('dataindex_admin')) {
    function dataindex_admin()
    {
        $ci = &get_instance();
        $data = [
            'title' => 'SIMARS | Dashboard',
            'user' => $ci->db->get('user_details'),
            'agenda' => $ci->db->get_where('agenda_details', ['is_verified' => 'accepted'])->result_array(),
            'agenda_count' => $ci->db->get_where('agenda_details', ['is_verified' => 'not_verified'])->num_rows(),
            'agenda_approve' => $ci->db->get_where('agenda_details', ['is_verified' => 'accepted'])->num_rows(),
            'agenda_declined' => $ci->db->get_where('agenda_details', ['is_verified' => 'declined'])->num_rows(),
        ];
        return $data;
    }
}
if (!function_exists('data_employees')) {
    function data_employees()
    {
        $ci = &get_instance();
        $all_user = $ci->db->get_where('user_details', ['id !=' => 1])->result_array();
        $data = [
            'title' => 'SIMARS | Employees',
            'user' => $all_user
        ];
        return $data;
    }
}
if (!function_exists('createuser_validation')) {
    function createuser_validation()
    {
        $ci = &get_instance();
        $ci->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user_details.username]|alpha_numeric');
        $ci->form_validation->set_rules('password', 'Password', 'required');
        $ci->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $ci->form_validation->set_rules('last_name', 'Last Name', 'trim');
        $ci->form_validation->set_rules('role', 'Role', 'required');
        if ($ci->form_validation->run() == false && $_POST) {
            $ci->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">' . validation_errors() . '</div>');
            redirect('administrator/employees');
        }
    }
}
if (!function_exists('edituser_validation')) {
    function edituser_validation()
    {
        $ci = &get_instance();
        $ci->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $ci->form_validation->set_rules('last_name', 'Last Name', 'trim');
        $ci->form_validation->set_rules('role', 'Role', 'required');
        if ($ci->form_validation->run() == false and $_POST) {
            $ci->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">' . validation_errors() . '</div>');
            redirect('administrator/employees');
        }
    }
}
if (!function_exists('data_agenda')) {
    function data_agenda()
    {
        $ci = &get_instance();
        $all_agenda = $ci->db->get_where('agenda_details', ['is_verified' => 'not_verified'])->result_array();
        $data = [
            'title' => 'SIMARS | Agenda',
            'agenda' => $all_agenda,
            'taskperson' => $ci->db->select('first_name, last_name')->from('user_details')->join('agenda_details', 'user_details.id = agenda_details.agenda_taskperson')->get()->result_array()
        ];
        return $data;
    }
}
if (!function_exists('history_agenda')) {
    function history_agenda()
    {
        $ci = &get_instance();
        $all_agenda = $ci->db->get('agenda_details')->result_array();
        $data = [
            'title' => 'SIMARS | History Agenda',
            'agenda' => $all_agenda,
        ];
        return $data;
    }
}
if (!function_exists('reject_validation')) {
    function reject_validation()
    {
        $ci = &get_instance();
        $ci->form_validation->set_rules('annotation', 'Annotation', 'required');
        if ($ci->form_validation->run() == false && $_POST) {
            $ci->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">Keterangan harus diisi!</div>');
            redirect('administrator/agenda');
        }
    }
}
if (!function_exists('changepasswordadmin_validation')) {
    function changepasswordadmin_validation()
    {
        $ci = &get_instance();
        $ci->form_validation->set_rules('OldPassword', 'Old Password', 'required|trim');
        $ci->form_validation->set_rules('NewPassword', 'New Password', 'required|trim|matches[NewPassword1]');
        $ci->form_validation->set_rules('NewPassword1', 'Confirm New Password', 'required|trim|matches[NewPassword]');
        if ($ci->form_validation->run() == false && $_POST) {
            $ci->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">' . validation_errors() . '</div>');
            redirect('administrator');
        }
    }
}
