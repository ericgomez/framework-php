<?php

return \FastRoute\simpleDispatcher( function ( \FastRoute\RouteCollector $route ) {
	$route->addRoute( 'GET', '/', ['Application\Controllers\HomeController', 'index']);
	$route->addRoute( 'GET', '/hello/{name}', ['Application\Controllers\HomeController', 'hello']);

	/**
	 * RUTAS LOGIN
	 */
	$route->addRoute( 'GET', '/login', ['Application\Controllers\LoginController', 'showLoginForm']);
	$route->addRoute( 'POST', '/login', ['Application\Controllers\LoginController', 'login']);

	/**
	 * RUTAS REGISTRO
	 */
	$route->addRoute( 'GET', '/register', ['Application\Controllers\RegisterController', 'showRegisterForm']);
	$route->addRoute( 'POST', '/register', ['Application\Controllers\RegisterController', 'register']);

	/**
	 * RUTAS PERFIL
	 */
	$route->addRoute( 'GET', '/profile', ['Application\Controllers\ProfileController', 'index', 'auth']);

	/**
	 * RUTA LOGOUT
	 */
	$route->addRoute( 'GET', '/logout', ['Application\Controllers\ProfileController', 'logout', 'auth']);

	/**
	 * RUTAS BLOG
	 */
	$route->addRoute( 'GET', '/blog[/{page:\d+}]', ['Application\Controllers\BlogController', 'index', 'auth']);
});