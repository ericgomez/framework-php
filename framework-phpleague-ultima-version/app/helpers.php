<?php

if ( ! function_exists('base_path')) {
	/**
	 * @param string $path
	 * @return string
	 */
	function base_path (string $path): string  {
		return __DIR__ . '/..//' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if ( ! function_exists( 'config')) {
	/**
	 * @param string $section
	 * @param string $key
	 *
	 * @return null|string
	 */
	function config (string $section, string $key): ?string {
		$config = \Application\Services\Config::instance();
		return $config->get($section, $key);
	}
}

if ( ! function_exists('appName')) {
	function appName () {
		return 'Nombre de nuestra aplicación';
	}
}
