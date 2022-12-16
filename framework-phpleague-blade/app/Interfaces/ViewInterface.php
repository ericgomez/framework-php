<?php
namespace Application\Interfaces;

use Psr\Http\Message\ResponseInterface;

interface ViewInterface {
	/**
	 * @param string $view
	 * @param array $data
	 *
	 * @return ResponseInterface
	 */
	public function render (string $view, array $data = []): ResponseInterface;
}