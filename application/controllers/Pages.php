<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->homepage();
    }

    public function homepage()
    {
        $this->twig->display('homepage');
    }

    public function not_found()
    {
        // TODO: 404 error-handling
        $this->homepage();
    }
}
