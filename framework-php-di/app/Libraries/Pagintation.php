<?php
namespace Application\Libraries;

use JasonGrimes\Paginator;

class Pagintation {

	/**
	 * @var Paginator
	 */
	protected $pagination;

	/**
	 * Pagintation constructor.
	 *
	 * @param $totalItems
	 * @param $itemsPerPage
	 * @param $page
	 * @param $urlPattern
	 */
	public function __construct($totalItems, $itemsPerPage, $page, $urlPattern) {
		$this->pagination = new Paginator( $totalItems, $itemsPerPage, $page, $urlPattern);
	}

	/**
	 * @return Paginator
	 */
	public function getPagination () {
		return $this->pagination;
	}
}