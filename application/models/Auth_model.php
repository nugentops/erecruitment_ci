<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function check_login($username)
    {
        return $this->db
                    ->get_where('users', ['username' => $username])
                    ->row();
    }

    public function total_applicants()
    {
        return $this->db
                    ->where('role_id', 2)
                    ->count_all_results('users');
    }
}