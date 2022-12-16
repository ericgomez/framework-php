<?php
namespace Application\Controllers;

use Application\Services\View;

class ProfileController extends BaseController {
	public function __construct( View $view ) {
		parent::__construct( $view );
	}

	public function index ($request, $response, $args) {
		return $this->view->render('profile.twig', $args);
	}
}