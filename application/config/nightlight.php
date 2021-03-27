<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Custom Nightlight config parameters
 */
if (!defined('CHAT_SYSTEMS')) {
    define('CHAT_SYSTEM_ZOHO', 'zoho');
    define('CHAT_SYSTEM_MIBEW', 'mibew');
    define('CHAT_SYSTEMS', [
        CHAT_SYSTEM_MIBEW,
        CHAT_SYSTEM_ZOHO,
    ]);
}

$config['nightlight_chat_system'] = CHAT_SYSTEM_MIBEW;
