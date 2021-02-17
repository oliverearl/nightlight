<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Env
{
    public function hook(): void
    {
        $dotenv = Dotenv\Dotenv::createUnsafeImmutable(FCPATH . '../');

        $dotenv->load();
    }
}
