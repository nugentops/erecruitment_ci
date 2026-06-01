<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function jobs()
    {
        $this->load->model('Jobs_model');

        $jobs = $this->Jobs_model->get_all_jobs();

        header('Content-Type: application/json');

        echo json_encode($jobs);
    }

    public function applications()
    {
        $this->load->model('Application_model');

        $applications =
            $this->Application_model->get_all_applications();

        header('Content-Type: application/json');

        echo json_encode($applications);
    }
}
