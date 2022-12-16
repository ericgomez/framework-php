<?php
namespace Application\Controllers;

use Application\Services\Twig;

class ProfileController extends BaseController {
	public function __construct( Twig $view ) {
		parent::__construct( $view );
	}

	public function index ($request, $args) {
		return $this->view->render('profile.twig', $args);
	}
}