<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function login()
    {
        if ($this->input->post()) {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->Auth_model->check_login($username);

            if ($user) {

                if (password_verify($password, $user->password)) {

                    $data_session = [
                        'user_id' => $user->id,
                        'username' => $user->username,
                        'role_id' => $user->role_id,
                        'logged_in' => TRUE
                    ];

                    $this->session->set_userdata($data_session);

                    if ($user->role_id == 1) {
                        redirect('admin/dashboard');
                    } else {
                        redirect('applicant/dashboard');
                    }

                } else {
                    echo "Password salah";
                }

            } else {
                echo "Username tidak ditemukan";
            }
        }

        $this->load->view('auth/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function register()
    {
        if ($this->input->post()) {

            $data = [
                'role_id'   => 2,
                'full_name' => $this->input->post('full_name'),
                'username'  => $this->input->post('username'),
                'email'     => $this->input->post('email'),
                'phone'     => $this->input->post('phone'),
                'password'  => password_hash(
                    $this->input->post('password'),
                    PASSWORD_DEFAULT
                )
            ];

            $this->db->insert('users', $data);

            redirect('auth/login');
        }

        $this->load->view('auth/register');
    }
}