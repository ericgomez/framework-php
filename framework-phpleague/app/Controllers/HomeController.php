<?php
namespace Application\Controllers;

use Application\Models\User;
use Application\Services\View;

class HomeController extends BaseController {

	public function __construct( View $view ) {
		parent::__construct( $view );
	}

	public function index ($request, $response) {
		$user = 'Iparra';
		return $this->view->render('home.twig', compact('user'));
	}

	public function findUser ($request, $response, $args) {
		$user = User::find($args['id']);
		return $this->view->render('user.twig', compact('user'));
	}

	public function randomUser ($request, $response) {
		$user = User::random();
		return $this->view->render('user.twig', compact('user'));
	}

	public function users ($request, $response) {
		$users = User::all();
		return $this->view->render('users.twig', compact('users'));
	}

	public function userPosts ($request, $response, $args) {
		$user = User::find($args['id']);
		$posts = $user->posts;
		return $this->view->render('posts.twig', compact('posts'));
	}
}