<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // cek login admin
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        if ($this->session->userdata('role_id') != 1) {
            redirect('auth/login');
        }

        $this->load->model('Jobs_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');

        $config['base_url'] = site_url('jobs/index');

        $config['total_rows'] =
            $this->Jobs_model->count_jobs($keyword);

        $config['per_page'] = 5;

        $config['uri_segment'] = 3;

        $config['full_tag_open'] =
        '<nav><ul class="pagination">';

        $config['full_tag_close'] =
        '</ul></nav>';

        $config['num_tag_open'] =
        '<li class="page-item"><span class="page-link">';

        $config['num_tag_close'] =
        '</span></li>';

        $config['cur_tag_open'] =
        '<li class="page-item active"><span class="page-link">';

        $config['cur_tag_close'] =
        '</span></li>';

        $config['next_tag_open'] =
        '<li class="page-item"><span class="page-link">';

        $config['next_tag_close'] =
        '</span></li>';

        $config['prev_tag_open'] =
        '<li class="page-item"><span class="page-link">';

        $config['prev_tag_close'] =
        '</span></li>';

        $this->pagination->initialize($config);

        $page = $this->uri->segment(3);

        if(!$page){
            $page = 0;
        }

        $data['jobs'] =
            $this->Jobs_model->get_jobs_paginated(
                $config['per_page'],
                $page,
                $keyword
            );

        $data['links'] =
            $this->pagination->create_links();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jobs/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jobs/create');
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $data = [
            'title' => $this->input->post('title'),
            'company' => $this->input->post('company'),
            'description' => $this->input->post('description'),
            'location' => $this->input->post('location'),
            'salary' => $this->input->post('salary')
        ];

        $this->Jobs_model->insert_job($data);

        redirect('jobs');
    }

    public function edit($id)
    {
        $data['job'] = $this->Jobs_model->get_job_by_id($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jobs/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $data = [
            'title' => $this->input->post('title'),
            'company' => $this->input->post('company'),
            'description' => $this->input->post('description'),
            'location' => $this->input->post('location'),
            'salary' => $this->input->post('salary')
        ];

        $this->Jobs_model->update_job($id, $data);

        redirect('jobs');
    }

    public function delete($id)
    {
        $this->Jobs_model->delete_job($id);

        redirect('jobs');
    }
}