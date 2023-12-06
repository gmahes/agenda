<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator_model extends CI_Model
{
    public function create_user()
    {
        $data = [
            'username'   => $this->input->post('username'),
            'password'   => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'first_name' => $this->input->post('first_name') . ' ',
            'last_name'  => $this->input->post('last_name'),
            'role'       => $this->input->post('role')
        ];
        $this->db->insert('user_details', $data);
        return true;
    }
    public function edit_user()
    {
        $data = [
            'id'         => $this->input->post('id'),
            'username'   => $this->input->post('username'),
            'first_name' => $this->input->post('first_name') . ' ',
            'last_name'  => $this->input->post('last_name'),
            'role'       => $this->input->post('role'),
        ];
        $data_agenda = [
            'agenda_taskperson' => $this->input->post('first_name') . ' ' . $this->input->post('last_name')
        ];
        $this->db->where('id', $this->input->post('id'))->update('user_details', $data);
        $this->db->where('user_id', $this->input->post('id'))->update('agenda_details', $data_agenda);
        return true;
    }
    public function delete_user()
    {
        $id = $this->input->post('id');
        $this->db->delete('user_details', ['id' => $id]);
        return true;
    }
    public function approve_agenda()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id)->update('agenda_details', ['is_verified' => 'accepted', 'agenda_validator' => $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name')]);
        return true;
    }
    public function reject_agenda()
    {
        $data = [
            'id' => $this->input->post('id'),
            'annotation' => $this->input->post('annotation')
        ];
        $this->db->where('id', $data['id'])->update('agenda_details', ['is_verified' => 'declined', 'agenda_validator' => $this->session->userdata('first_name') . $this->session->userdata('last_name'), 'agenda_annotation' => $data['annotation']]);
        return true;
    }
    public function reset_password()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id)->update('user_details', ['password' => password_hash('12345678', PASSWORD_DEFAULT)]);
        return true;
    }
}
