<?php

use Application\Controllers\BlogController;
use Application\Controllers\HomeController;
use Application\Controllers\LoginController;
use Application\Controllers\ProfileController;
use Application\Controllers\RegisterController;
use Application\Libraries\Auth;
use Application\Libraries\BCrypt;
use Application\Providers\Doctrine;
use Application\Providers\View;
use Application\Utils\TwigFunctions;
use Application\Validators\LoginValidator;
use Aura\Session\Session;

return [
	'config.database' => function () {
		return parse_ini_file(base_path('app/Config/database.ini'));
	},
	HomeController::class => \DI\create()->constructor(\DI\get(Doctrine::class)),
	LoginController::class => \DI\create()->constructor(
		\DI\get( View::class),
		\DI\get(LoginValidator::class),
		\DI\get(Session::class)
	),
	RegisterController::class => \DI\create()->constructor(\DI\get(Session::class)),
	ProfileController::class => \DI\create()->constructor(\DI\get(Session::class)),
	BlogController::class => \DI\create(),
	Doctrine::class => function (\Psr\Container\ContainerInterface $container) {
		return new Doctrine($container);
	},
	View::class => \DI\create(View::class),
	'SharedContainerTwig' => function (\Psr\Container\ContainerInterface $container) {
		TwigFunctions::setContainer($container);
	},
	Session::class => function (): Session {
		return (new \Aura\Session\SessionFactory())->newInstance($_COOKIE);
	},
	LoginValidator::class => \DI\create(LoginValidator::class),
	BCrypt::class => \DI\create(BCrypt::class),
	Auth::class => \DI\create(Auth::class)->constructor(\DI\get(Session::class))
];