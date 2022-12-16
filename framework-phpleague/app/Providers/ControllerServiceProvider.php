<?php
namespace Application\Providers;

use Application\Controllers\HomeController;
use Application\Controllers\ProfileController;
use Application\Services\View;
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
		$this->getContainer()->add(HomeController::class)->withArguments([
			$this->getContainer()->get(View::class)
		]);
		$this->getContainer()->add(ProfileController::class)->withArguments([
			$this->getContainer()->get(View::class)
		]);
	}
}