<?php

use Application\Middlewares\Auth;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$strategy = (new \League\Route\Strategy\ApplicationStrategy)->setContainer($container);
$route = (new \League\Route\Router)->setStrategy($strategy);

$route->group( '/', function (\League\Route\RouteGroup $route) use ($container) {
	$route->map( 'GET', '/', 'Application\Controllers\HomeController::index');
	$route->map( 'GET', '/user/{id}', 'Application\Controllers\HomeController::findUser');
	$route->map( 'GET', '/user_random', 'Application\Controllers\HomeController::randomUser');
	$route->map( 'GET', '/user/{id}/posts', 'Application\Controllers\HomeController::userPosts');
	$route->map( 'GET', '/users', 'Application\Controllers\HomeController::users');
	$route->map( 'GET', '/profile/{name}/{age}', 'Application\Controllers\ProfileController::index')
		->middleware($container->get(Auth::class));

	$route->map('GET', '/config', function (ServerRequestInterface $request, array $args) use ($container) {
		$response = $container->get('response');
		$driver = config('environment', 'type');
		$response->getBody()->write("<h1>{$driver}</h1>");
		return $response;
	});
});

return $route;