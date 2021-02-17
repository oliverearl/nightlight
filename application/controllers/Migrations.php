<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migrations extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (version_compare(phpversion(), '8.0', '>=')) {
            exit('CI3 migrations do not work properly under PHP 8.' . PHP_EOL);
        }

        if (PHP_SAPI !== 'cli') {
            exit('Migrations must be run from the command-line.' . PHP_EOL);
        }

        if (!env('MIGRATIONS_ENABLED')) {
            exit('Migrations must be explicitly enabled in the environment file.' . PHP_EOL);
        }
    }

    public function index(): void
    {
        $this->load->library('migration');

        $migration = $this->migration->current();

        // looks stupid but requires strict checking
        if ($migration === true) {
            echo 'No migrations to perform.' . PHP_EOL;
        } elseif ($migration === false) {
            show_error($this->migration->error_string() . PHP_EOL);
        } else {
            echo 'Migrations complete' . PHP_EOL;
        }
    }

    public function migrate(): void
    {
        $this->index();
    }
}
