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

    public function call(): void
    {
        $this->twig->display('call');
    }

    public function chat(): void
    {
        if (ENVIRONMENT === 'testing' && $this->input->get('chat_override')) {
            $this->config->set_item('nightlight_chat_system', $this->input->get('chat_override'));
        }

        $this->twig->display('chat', [
            'chat' => $this->config->item('nightlight_chat_system'),
        ]);
    }

    public function email(): void
    {
        $this->twig->display('email');
    }

    public function our_principles(): void
    {
        $this->twig->display('principles');
    }

    public function not_found(): void
    {
        // TODO: 404 error-handling
        $this->homepage();
    }
}
