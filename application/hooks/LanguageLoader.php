<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LanguageLoader
{
    public function initialise()
    {
        $ci = &get_instance();

        $ci->load->helper('language');

        $site_lang = $ci->session->userdata('site_lang');

        if ($site_lang) {
            $ci->lang->load($site_lang, $site_lang);
        } else {
            $ci->lang->load('english', 'english');
        }
    }
}
