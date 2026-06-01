<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        
        // cek login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        // cek role admin
        if ($this->session->userdata('role_id') != 1) {
            redirect('auth/login');
        }

        $this->load->model('Auth_model');
        $this->load->model('Jobs_model');
        $this->load->model('Application_model');
        $this->load->library('pagination');

    }

    public function dashboard()
    {
        $data['total_jobs'] = $this->Jobs_model->total_jobs();

        $data['total_applicants'] =
            $this->Auth_model->total_applicants();

        // sementara dummy dulu
        $data['total_applications'] =
            $this->Application_model->total_applications();

        $this->db->select('status, COUNT(*) as total');
        $this->db->group_by('status');

        $data['status_chart'] =
            $this->db->get('applications')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function applications()
    {
        $data['applications'] =
            $this->Application_model->get_all_applications();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/applications', $data);
        $this->load->view('templates/footer');
    }

    public function update_status()
    {
        $id = $this->input->post('id');

        $data = [
            'status' => $this->input->post('status'),
            'notes' => $this->input->post('notes')
        ];

        $this->db->where('id', $id);

        $this->db->update('applications', $data);

        redirect('admin/applications');
    }

    public function export_pdf()
    {
        $this->db->select('
            applications.id,
            applications.status,
            applications.notes,
            users.username,
            jobs.title
        ');

        $this->db->from('applications');

        $this->db->join(
            'users',
            'applications.applicant_id = users.id'
        );

        $this->db->join(
            'jobs',
            'applications.job_id = jobs.id'
        );

        $query = $this->db->get();

        $data['applications'] = $query->result();

        $html = $this->load->view(
            'admin/pdf_report',
            $data,
            TRUE
        );

        require_once APPPATH . '../vendor/autoload.php';

        $dompdf = new Dompdf\Dompdf();

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream(
            "laporan_pelamar.pdf",
            array("Attachment" => false)
        );
    }

    public function export_excel()
    {
        require 'vendor/autoload.php';

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Applicant');
        $sheet->setCellValue('C1', 'Lowongan');
        $sheet->setCellValue('D1', 'Status');
        $sheet->setCellValue('E1', 'Catatan HRD');

        $this->db->select('
            applications.*,
            users.username,
            jobs.title
        ');

        $this->db->from('applications');

        $this->db->join(
            'users',
            'applications.applicant_id = users.id'
        );

        $this->db->join(
            'jobs',
            'applications.job_id = jobs.id'
        );

        $applications = $this->db->get()->result();

        $row = 2;
        $no = 1;

        foreach($applications as $app){

            $sheet->setCellValue('A'.$row, $no++);
            $sheet->setCellValue('B'.$row, $app->username);
            $sheet->setCellValue('C'.$row, $app->title);
            $sheet->setCellValue('D'.$row, $app->status);
            $sheet->setCellValue('E'.$row, $app->notes);

            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');

        header('Content-Disposition: attachment;filename="laporan_pelamar.xlsx"');

        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function applicants()
    {
        $keyword = $this->input->get('keyword');

        if($keyword){

            $this->db->group_start();

            $this->db->like('full_name', $keyword);
            $this->db->or_like('username', $keyword);
            $this->db->or_like('email', $keyword);

            $this->db->group_end();
        }

        $this->db->where('role_id', 2);

        $config['base_url'] =
            site_url('admin/applicants');

        $config['total_rows'] =
            $this->db->count_all_results('users');

        $config['per_page'] = 5;

        $config['uri_segment'] = 3;

        $config['full_tag_open'] =
            '<nav><ul class="pagination">';

        $config['full_tag_close'] =
            '</ul></nav>';

        $config['cur_tag_open'] =
            '<li class="page-item active"><span class="page-link">';

        $config['cur_tag_close'] =
            '</span></li>';

        $config['num_tag_open'] =
            '<li class="page-item"><span class="page-link">';

        $config['num_tag_close'] =
            '</span></li>';

        $this->pagination->initialize($config);

        $page = $this->uri->segment(3);

        if(!$page){
            $page = 0;
        }

        $this->db->where('role_id', 2);

        if($keyword){

            $this->db->group_start();

            $this->db->like('full_name', $keyword);
            $this->db->or_like('username', $keyword);
            $this->db->or_like('email', $keyword);

            $this->db->group_end();
        }

        $this->db->limit(
            $config['per_page'],
            $page
        );

        $data['applicants'] =
            $this->db->get('users')->result();

        $data['links'] =
            $this->pagination->create_links();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/applicants', $data);
        $this->load->view('templates/footer');
    }

    public function detail_applicant($id)
    {
        $data['applicant'] =
            $this->db
                ->get_where('users',
                ['id'=>$id])
                ->row();

        $this->db->select('
            jobs.title,
            applications.status,
            applications.notes
        ');

        $this->db->from('applications');

        $this->db->join(
            'jobs',
            'applications.job_id = jobs.id'
        );

        $this->db->where(
            'applications.applicant_id',
            $id
        );

        $data['applications'] =
            $this->db->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/detail_applicant',$data);
        $this->load->view('templates/footer');
    }
}