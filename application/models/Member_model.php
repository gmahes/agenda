<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{
    public function create_agenda()
    {
        $agenda_accepted = $this->db->get_where('agenda_details', ['is_verified' => 'accepted'])->result_array();
        $data_post = [
            'user_id'  => $this->input->post('user_id'),
            'agenda_number'   => $this->input->post('AgendaNumber'),
            'agenda_date'   => $this->input->post('Date'),
            'agenda_start' => $this->input->post('Time'),
            'agenda_end' => $this->input->post('Time1'),
            'agenda_place'  => $this->input->post('AgendaPlace'),
            'agenda_program'       => $this->input->post('AgendaProgram'),
            'agenda_taskperson'       => $this->input->post('AgendaTaskperson'),
            'is_verified'       => $this->input->post('is_verified'),
        ];
        foreach ($agenda_accepted as $a) {
            if (strtotime($data_post['agenda_end']) < strtotime($data_post['agenda_start'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">Waktu selesai tidak boleh lebih awal dari waktu mulai!</div>');
                redirect('member/agenda');
            } elseif ($data_post['agenda_date'] == $a['agenda_date'] && $data_post['agenda_place'] == $a['agenda_place']) {
                if (strtotime($data_post['agenda_start']) >= strtotime($a['agenda_start'])) {
                    if (strtotime($data_post['agenda_end']) <= strtotime($a['agenda_end'])) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">Agenda yang anda buat bentrok dengan agenda lain! Silahkan cek agenda yang sudah terjadwal</div>');
                        redirect('member/agenda');
                    } elseif (strtotime($data_post['agenda_end']) > strtotime($a['agenda_end'])) {
                        if (strtotime($data_post['agenda_start']) < strtotime($a['agenda_end'])) {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">Agenda yang anda buat bentrok dengan agenda lain! Silahkan cek agenda yang sudah terjadwal</div>');
                            redirect('member/agenda');
                        }
                    }
                } elseif (strtotime($data_post['agenda_start']) < strtotime($a['agenda_start'])) {
                    if (strtotime($data_post['agenda_end']) > strtotime($a['agenda_start'])) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">Agenda yang anda buat bentrok dengan agenda lain! Silahkan cek agenda yang sudah terjadwal</div>');
                        redirect('member/agenda');
                    }
                }
            }
        }
        $this->db->insert('agenda_details', $data_post);
        return true;
    }
    public function edit_agenda()
    {
        $agenda_accepted = $this->db->get_where('agenda_details', ['is_verified' => 'accepted'])->result_array();
        $data_post = [
            'agenda_number'   => $this->input->post('AgendaNumber'),
            'agenda_date'   => $this->input->post('Date'),
            'agenda_start' => $this->input->post('Time'),
            'agenda_end' => $this->input->post('Time1'),
            'agenda_place'  => $this->input->post('AgendaPlace'),
            'agenda_program'       => $this->input->post('AgendaProgram'),
            'agenda_taskperson'       => $this->input->post('AgendaTaskperson'),
        ];
        if (strtotime($data_post['agenda_end']) < strtotime($data_post['agenda_start'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">Waktu selesai tidak boleh lebih awal dari waktu mulai!</div>');
            redirect('member/agenda');
        }
        foreach ($agenda_accepted as $a) {
            if ($data_post['agenda_date'] == $a['agenda_date'] && $data_post['agenda_place'] == $a['agenda_place']) {
                if (strtotime($data_post['agenda_start']) >= strtotime($a['agenda_start'])) {
                    if (strtotime($data_post['agenda_end']) <= strtotime($a['agenda_end'])) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">Agenda yang anda buat bentrok dengan agenda lain! Silahkan cek agenda yang sudah terjadwal</div>');
                        redirect('member/agenda');
                    } elseif (strtotime($data_post['agenda_end']) > strtotime($a['agenda_end'])) {
                        if (strtotime($data_post['agenda_start']) < strtotime($a['agenda_end'])) {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">Agenda yang anda buat bentrok dengan agenda lain! Silahkan cek agenda yang sudah terjadwal</div>');
                            redirect('member/agenda');
                        }
                    }
                } elseif (strtotime($data_post['agenda_start']) < strtotime($a['agenda_start'])) {
                    if (strtotime($data_post['agenda_end']) > strtotime($a['agenda_start'])) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">Agenda yang anda buat bentrok dengan agenda lain! Silahkan cek agenda yang sudah terjadwal</div>');
                        redirect('member/agenda');
                    }
                }
            }
        }
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('agenda_details', $data_post);
        return true;
    }
    public function delete_agenda()
    {
        $id = $this->input->post('id');
        $this->db->delete('agenda_details', ['id' => $id]);
        return true;
    }
}
