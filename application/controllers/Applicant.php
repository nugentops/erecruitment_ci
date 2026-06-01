<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Jobs_model');
        $this->load->model('Application_model');

        // cek login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        // cek role applicant
        if ($this->session->userdata('role_id') != 2) {
            redirect('auth/login');
        }
    }

    public function dashboard()
    {
        $user_id =
            $this->session->userdata('user_id');

        $data['user'] =
            $this->db
                ->where('id', $user_id)
                ->get('users')
                ->row();

        $this->load->view('templates/header');
        $this->load->view('applicant/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function jobs()
    {
        $keyword = $this->input->get('keyword');

        if($keyword){

            $this->db->group_start();

            $this->db->like('title', $keyword);
            $this->db->or_like('company', $keyword);
            $this->db->or_like('location', $keyword);

            $this->db->group_end();
        }

        $config['base_url'] = site_url('applicant/jobs');

        $config['total_rows'] = $this->db->count_all_results('jobs', false);

        $config['per_page'] = 3;

        $config['uri_segment'] = 3;

        $config['use_page_numbers'] = TRUE;

        // Bootstrap Pagination
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';

        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';

        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';

        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);

        $page = $this->uri->segment(3);

        if(!$page){
            $page = 1;
        }

        $start = ($page - 1) * $config['per_page'];

        $this->db->limit($config['per_page'], $start);

        $data['jobs'] = $this->db->get()->result();

        $data['links'] = $this->pagination->create_links();

        $this->load->view('templates/header');
        $this->load->view('applicant/jobs', $data);
        $this->load->view('templates/footer');
    }

    public function apply($job_id)
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('cv_file')) {

            echo $this->upload->display_errors();

        } else {

            $upload_data = $this->upload->data();

            $data = [
                'applicant_id' => $this->session->userdata('user_id'),
                'job_id' => $job_id,
                'cv_file' => $upload_data['file_name'],
                'status' => 'pending'
            ];

            $check = $this->Application_model->check_application(
                $this->session->userdata('user_id'),
                $job_id
            );

            if($check){

                $this->session->set_flashdata(
                    'error',
                    'Anda sudah pernah melamar lowongan ini!'
                );

                redirect('applicant/jobs');
            }

            $this->db->trans_start();

            $this->Application_model->insert_application($data);

            $this->db->trans_complete();

            $this->session->set_flashdata(
                'success',
                'Lamaran berhasil dikirim! Silakan tunggu konfirmasi dari HRD.'
            );

            redirect('applicant/jobs');
        }
    }

    public function my_applications()
    {
        $this->db->select('
            applications.*,
            jobs.title
        ');

        $this->db->from('applications');

        $this->db->join(
            'jobs',
            'jobs.id = applications.job_id'
        );

        $this->db->where(
            'applications.applicant_id',
            $this->session->userdata('user_id')
        );

        $data['applications'] =
            $this->db->get()->result();

        $this->load->view('templates/header');
        $this->load->view('applicant/my_applications', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $user_id = $this->session->userdata('user_id');

        $data['user'] = $this->db
            ->get_where('users', ['id' => $user_id])
            ->row();

        $this->load->view('templates/header');
        $this->load->view('applicant/profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profile()
    {
        $user_id = $this->session->userdata('user_id');

        $data['user'] = $this->db
            ->get_where('users', ['id'=>$user_id])
            ->row();

        $this->load->view('templates/header');
        $this->load->view('applicant/edit_profile', $data);
        $this->load->view('templates/footer');
    }

    public function update_profile()
    {
        $user_id = $this->session->userdata('user_id');

        $data = [
            'full_name' => $this->input->post('full_name'),
            'email'     => $this->input->post('email'),
            'phone'     => $this->input->post('phone')
        ];

        // Upload Foto
        if(!empty($_FILES['photo']['name'])){

            $config['upload_path']   = './uploads/profile/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;

            $this->load->library('upload', $config);

            if($this->upload->do_upload('photo')){

                $upload_data = $this->upload->data();

                $data['photo'] =
                    $upload_data['file_name'];
            }
        }

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);

        redirect('applicant/profile');
    }

}