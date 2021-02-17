<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Languages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function en(): void
    {
        $this->switchLanguage('english');
    }

    public function cy(): void
    {
        $this->switchLanguage('welsh');
    }

    protected function switchLanguage(string $language = ''): void
    {
        $language = ($language !== '') ? $language : 'english';

        $this->session->set_userdata('site_lang', $language);

        redirect(base_url());
    }
}
