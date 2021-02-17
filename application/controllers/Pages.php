<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): void
    {
        $this->homepage();
    }

    public function homepage(): void
    {
        $this->twig->display('homepage');
    }

    public function not_found(): void
    {
        // TODO: 404 error-handling
        $this->homepage();
    }
}
