<?php
namespace Application\Providers;

use Application\Controllers\HomeController;
use Application\Controllers\ProfileController;
use Application\Services\Blade;
use Application\Services\Twig;
use League\Container\ServiceProvider\AbstractServiceProvider;

class ControllerServiceProvider extends AbstractServiceProvider {

	/**
	 * @var array
	 */
	protected $provides = [
		HomeController::class,
		ProfileController::class
	];

	/**
	 * @throws \Psr\Container\ContainerExceptionInterface
	 * @throws \Psr\Container\NotFoundExceptionInterface
	 */
	public function register() {
		$this->getContainer()->add(HomeController::class)->addArguments([
			$this->getContainer()->get(Blade::class)
		]);
		$this->getContainer()->add(ProfileController::class)->addArguments([
			$this->getContainer()->get(Twig::class)
		]);
	}
}