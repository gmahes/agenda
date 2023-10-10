<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employees_model extends CI_Model
{
    public function user()
    {
        $user = $this->db->get('user_details')->result_array();
        foreach ($user as $row) {
            echo implode($row);
        }
    }
}
