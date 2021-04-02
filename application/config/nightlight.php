<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Custom Nightlight config parameters
 */
if (!defined('CHAT_SYSTEMS')) {
    define('CHAT_SYSTEM_NLA', 'mibew');
    define('CHAT_SYSTEM_LEGACY', 'zoho');
    define('CHAT_SYSTEMS', [
        CHAT_SYSTEM_NLA,
        CHAT_SYSTEM_LEGACY,
    ]);
}

// Interestingly, if the array_search returns false, it's coerced into zero and returns the first index as a default
$config['nightlight_chat_system'] = CHAT_SYSTEMS[
    array_search(getenv('NIGHTLIGHT_CHAT_SYSTEM'), CHAT_SYSTEMS)
];
