<?php
namespace Application\Controllers;

use Application\Services\View;

/**
 * Class BaseController
 * @package Application\Controllers
 */
class BaseController {
	/**
	 * @var View
	 */
	protected $view;

	/**
	 * BaseController constructor.
	 *
	 * @param View $view
	 */
	public function __construct(View $view) {
		$this->view = $view;
	}
}