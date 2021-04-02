<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function chat_nla(): void
    {
        $this->changeConfigItem('nightlight_chat_system', CHAT_SYSTEM_NLA);
    }

    public function chat_legacy(): void
    {
        $this->changeConfigItem('nightlight_chat_system', CHAT_SYSTEM_LEGACY);
    }

    /**
     * Changes chosen configuration item for running tests.
     *
     * @param string $key
     * @param string $value
     */
    private function changeConfigItem(string $key, string $value): void
    {
        if (ENVIRONMENT === 'testing') {
            $this->config->set_item($key, $value);

            $this->output->set_status_header(204);
        } else {
            redirect('/', 'refresh');
        }
    }
}
