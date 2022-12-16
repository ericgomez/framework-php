<?php
namespace Application\Middlewares;

use Application\Services\Session;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response;

/**
 * Class Auth
 * @package Application\Middlewares
 */
class Auth implements MiddlewareInterface {
	/**
	 * @var Session
	 */
	protected $session;

	/**
	 * Auth constructor.
	 *
	 * @param Session $session
	 */
	public function __construct(Session $session) {
		$this->session = $session;
	}

	/**
	 * Process an incoming server request and return a response, optionally delegating
	 * response creation to a handler.
	 *
	 * @param ServerRequestInterface $request
	 * @param RequestHandlerInterface $handler
	 *
	 * @return ResponseInterface
	 */
	public function process( ServerRequestInterface $request, RequestHandlerInterface $handler ): ResponseInterface {
		$response = new Response;
		if ( ! $this->session->get('user')) {
			return $response
				->withStatus( 302)
				->withHeader('Location', '/');
		}
	}
}