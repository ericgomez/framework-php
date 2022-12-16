<?php
namespace Application\Controllers;

use Application\Interfaces\ViewInterface;
use Application\Models\User;

class HomeController extends BaseController {

	public function __construct( ViewInterface $view ) {
		parent::__construct( $view );
	}

	public function index ($request) {
		$user = User::with('posts')->find(11);
		return $this->view->render('home', compact('user'));
	}

	public function findUser ($request, array $args) {
		$user = User::find($args['id']);
		return $this->view->render('user', compact('user'));
	}

	public function randomUser ($request) {
		$user = User::random();
		return $this->view->render('user', compact('user'));
	}

	public function users ($request) {
		$users = User::all();
		return $this->view->render('users', compact('users'));
	}

	public function userPosts ($request, $args) {
		$user = User::find($args['id']);
		$posts = $user->posts;
		return $this->view->render('posts', compact('posts'));
	}
}