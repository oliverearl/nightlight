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

    public function what_is_nightline(): void
    {
        $this->twig->display('what-is-nightline');
    }

    public function not_found(): void
    {
        // TODO: 404 error-handling
        $this->homepage();
    }
}
