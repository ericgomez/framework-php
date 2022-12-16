<?php
namespace Application\Controllers;

use Application\Interfaces\ViewInterface;

/**
 * Class BaseController
 * @package Application\Controllers
 */
class BaseController {
	/**
	 * @var Twig
	 */
	protected $view;

	/**
	 * BaseController constructor.
	 *
	 * @param ViewInterface $view
	 */
	public function __construct(ViewInterface $view) {
		$this->view = $view;
	}
}