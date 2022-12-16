<?php
namespace Application\Providers;

use Application\Services\Blade;
use Application\Services\Twig;
use League\Container\ServiceProvider\AbstractServiceProvider;

class ViewServiceProvider extends AbstractServiceProvider {

	/**
	 * @var array
	 */
	protected $provides = [
		Twig::class,
		Blade::class
	];

	/**
	 * @throws \Psr\Container\ContainerExceptionInterface
	 * @throws \Psr\Container\NotFoundExceptionInterface
	 */
	public function register() {
		$this->getContainer()->add(Twig::class)->addArgument(
			$this->getContainer()->get('response')
		);

		$this->getContainer()->add(Blade::class)->addArgument(
			$this->getContainer()->get('response')
		);
	}
}