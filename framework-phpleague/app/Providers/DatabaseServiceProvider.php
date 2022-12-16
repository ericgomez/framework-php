<?php
namespace Application\Providers;

use Illuminate\Database\Capsule\Manager;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class DatabaseServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface {

	/**
	 * Method will be invoked on registration of a service provider implementing
	 * this interface. Provides ability for eager loading of Service Providers.
	 *
	 * @return void
	 */
	public function boot() {
		$manager = new Manager();
		$manager->addConnection([
			"driver"    => getenv('DB_DRIVER'),
			"host"      => getenv('DB_HOST'),
			"database"  => getenv('DB_NAME'),
			"username"  => getenv('DB_USER'),
			"password"  => getenv('DB_PASSWORD'),
		]);
		$manager->bootEloquent();
	}

	/**
	 * Use the register method to register items with the container via the
	 * protected $this->container property or the `getContainer` method
	 * from the ContainerAwareTrait.
	 *
	 * @return void
	 */
	public function register() {
		// TODO: Implement register() method.
	}
}