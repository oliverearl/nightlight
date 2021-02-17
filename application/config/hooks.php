<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|    https://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['pre_system'] = [
    'class' => 'Env',
    'function' => 'hook',
    'filename' => 'Env.php',
    'filepath' => 'hooks',
];

$hook['post_controller_constructor'] = [
    'class' => 'LanguageLoader',
    'function' => 'initialise',
    'filename' => 'LanguageLoader.php',
    'filepath' => 'hooks',
];
