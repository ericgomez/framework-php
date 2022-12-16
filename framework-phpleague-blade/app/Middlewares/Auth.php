<?php
namespace Application\Middlewares;

use Application\Services\Session;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class Auth
 * @package Application\Middlewares
 */
class Auth {
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
	 * @param ServerRequestInterface $request
	 * @param ResponseInterface $response
	 * @param callable $next
	 *
	 * @return static
	 */
	public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next) {
		if ( ! $this->session->get('user')) {
			return $response
				->withStatus( 302)
				->withHeader('Location', '/');
		}
		return $next($request, $response);
	}
}