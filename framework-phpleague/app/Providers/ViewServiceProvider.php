<?php
namespace Application\Providers;

use Application\Services\View;
use League\Container\ServiceProvider\AbstractServiceProvider;

class ViewServiceProvider extends AbstractServiceProvider {

	/**
	 * @var array
	 */
	protected $provides = [
		View::class
	];

	/**
	 * @throws \Psr\Container\ContainerExceptionInterface
	 * @throws \Psr\Container\NotFoundExceptionInterface
	 */
	public function register() {
		$this->getContainer()->add(View::class)->withArgument(
			$this->getContainer()->get('response')
		);
	}
}