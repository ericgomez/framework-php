<?php

use Application\Middlewares\Auth;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../vendor/autoload.php';

$dotEnv = new \Dotenv\Dotenv(base_path( ''));
$dotEnv->load();

$container = new \League\Container\Container;

$container->share('response', \Zend\Diactoros\Response::class);
$container->share('request', function () {
	return \Zend\Diactoros\ServerRequestFactory::fromGlobals(
		$_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
	);
});

$container->addServiceProvider(new \Application\Providers\SessionServiceProvider);
$container->addServiceProvider(new \Application\Providers\ViewServiceProvider);
$container->addServiceProvider(new \Application\Providers\ControllerServiceProvider);
$container->addServiceProvider(new \Application\Providers\DatabaseServiceProvider);

$container->share(Auth::class)->withArgument($container->get(\Application\Services\Session::class));

$route = require base_path('routes/web.php');

$container->share('emitter', Zend\Diactoros\Response\SapiEmitter::class);

$response = $route->dispatch($container->get('request'), $container->get('response'));

$container->get('emitter')->emit($response);