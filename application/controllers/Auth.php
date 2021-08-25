<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library([
            'ion_auth',
            'form_validation',
        ]);

        $this
            ->form_validation
            ->set_error_delimiters(
                $this->config->item('error_start_delimiter', 'ion_auth'),
                $this->config->item('error_end_delimiter', 'ion_auth')
            );

        $this->twig->addGlobal('csrf_name', $this->security->get_csrf_token_name());
        $this->twig->addGlobal('csrf_hash', $this->security->get_csrf_hash());
    }

    public function index(): void
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('login', 'refresh');
        }

        $this->data['message'] = $this->get_errors();

        $this->twig->display('login/login', $this->data);
    }

    public function login(): void
    {
        if ($this->ion_auth->logged_in()) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === true) {
            if ($this->ion_auth->login(
                $this->input->post('email'),
                $this->input->post('password')
            )) {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('dashboard', 'refresh');
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('login', 'refresh');
            }
        } else {
            $this->data['message'] = $this->get_errors();
            $this->twig->display('login/login', $this->data);
        }
    }

    public function logout(): void
    {
        $this->ion_auth->logout();

        redirect('auth/login', 'refresh');
    }

    protected function get_errors(): string
    {
        return validation_errors() ?: $this->session->flashdata('message') ?? '';
    }
}
