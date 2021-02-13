<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Env
{
    /**
     * Env constructor.
     */
    public function __construct()
    {
        $dotenv = Dotenv\Dotenv::createUnsafeImmutable(FCPATH . '../');

        $dotenv->load();
    }
}
