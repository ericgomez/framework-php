<?php
namespace Application\Services;

use Psr\Http\Message\ResponseInterface;

class View {
	/**
	 * @var \Twig_Environment
	 */
	protected $view;

	/**
	 * @var ResponseInterface
	 */
	protected $response;

	/**
	 * View constructor.
	 *
	 * @param ResponseInterface $response
	 */
	public function __construct(ResponseInterface $response) {
		$loader = new \Twig_Loader_Filesystem(base_path('app/Views'));
		$view = new \Twig_Environment($loader);
		$this->view = $view;
		$this->response = $response;
	}

	/**
	 * @param string $view
	 * @param array $data
	 *
	 * @return ResponseInterface
	 * @throws \Twig_Error_Loader
	 * @throws \Twig_Error_Runtime
	 * @throws \Twig_Error_Syntax
	 */
	public function render (string $view, array $data = []): ResponseInterface {
		$this->response->getBody()->write($this->view->render($view, $data));
		return $this->response;
	}
}