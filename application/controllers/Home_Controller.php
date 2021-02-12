<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('twig');
    }

    public function index()
    {
        $this->twig->display('homepage', []);
    }
}
