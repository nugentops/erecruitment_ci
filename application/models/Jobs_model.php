<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs_model extends CI_Model {

    public function get_all_jobs()
    {
        return $this->db->get('jobs')->result();
    }

    public function insert_job($data)
    {
        return $this->db->insert('jobs', $data);
    }

    public function get_job_by_id($id)
    {
        return $this->db->get_where('jobs', ['id' => $id])->row();
    }

    public function update_job($id, $data)
    {
        return $this->db->where('id', $id)
                        ->update('jobs', $data);
    }

    public function delete_job($id)
    {
        return $this->db->delete('jobs', ['id' => $id]);
    }

    public function total_jobs()
    {
        return $this->db->count_all('jobs');
    }

    public function count_jobs($keyword = null)
    {
        if($keyword){
            $this->db->like('title', $keyword);
            $this->db->or_like('company', $keyword);
        }

        return $this->db->count_all_results('jobs');
    }

    public function get_jobs_paginated($limit, $start, $keyword = null)
    {
        if($keyword){
            $this->db->like('title', $keyword);
            $this->db->or_like('company', $keyword);
        }

        return $this->db
            ->limit($limit, $start)
            ->get('jobs')
            ->result();
    }

}