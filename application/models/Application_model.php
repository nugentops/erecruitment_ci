<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Application_model extends CI_Model {

    public function insert_application($data)
    {
        return $this->db->insert('applications', $data);
    }

    public function total_applications()
    {
        return $this->db->count_all('applications');
    }

    public function get_all_applications()
    {
        $this->db->select('
            applications.*,
            users.username,
            users.full_name,
            users.photo,
            jobs.title
        ');

        $this->db->from('applications');

        $this->db->join(
            'users',
            'users.id = applications.applicant_id'
        );

        $this->db->join(
            'jobs',
            'jobs.id = applications.job_id'
        );

        return $this->db->get()->result();
    }

    public function check_application($applicant_id, $job_id)
    {
        return $this->db
            ->where('applicant_id', $applicant_id)
            ->where('job_id', $job_id)
            ->get('applications')
            ->row();
    }
}