<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Language extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function en()
    {
        $this->switchLanguage('english');
    }

    public function cy()
    {
        $this->switchLanguage('welsh');
    }

    protected function switchLanguage($language = '')
    {
        $language = ($language !== '') ? $language : 'english';

        $this->session->set_userdata('site_lang', $language);

        redirect(base_url());
    }
}
