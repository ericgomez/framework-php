<?php
namespace Application\Services;

class Config {

	/**
	 * @var
	 */
	private static $instance;

	/**
	 * Config constructor.
	 */
	private function __construct () {}

	/**
	 * @return Config
	 */
	public static function instance (): Config {
		if ( ! isset( self::$instance)) {
			$class = __CLASS__;
			self::$instance = new $class;
		}
		return self::$instance;
	}

	/**
	 * @param string $section
	 * @param string $key
	 *
	 * @return null|string
	 */
	public function get (string $section, string $key): ?string {
		$config = parse_ini_file(base_path('app/config.ini'), true);
		if ( array_key_exists($section, $config)) {
			if ( array_key_exists($key, $config[$section])) {
				return $config[$section][$key];
			}
		}
		return null;
	}

	public function __clone() {
		trigger_error('Clone object not allowed', E_USER_ERROR);
	}
}