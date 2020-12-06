<?php
require_once 'Dotenv.php';
require_once 'Loader.php';
require_once 'Validator.php';

if (! function_exists('env')) {
	/**
	 * Gets the environment variable if set, or returns a default value
	 * Credit: https://github.com/agungjk/phpdotenv-for-codeigniter/pull/5/files
	 * @param string $env_name
	 * @param mixed $default_value
	 * @return array|mixed
	 */
	function env($env_name = null, $default_value = '')
	{
		if (is_null($env_name)) {
			return getenv();
		}
		return getenv($env_name) ? getenv($env_name) : $default_value;
	}
}
