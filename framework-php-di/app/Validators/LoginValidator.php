<?php
namespace Application\Validators;

use Respect\Validation\Validator;

class LoginValidator {

	/**
	 * @var Validator
	 */
	protected static $validator;

	protected $rules = [];

	protected $messages = [];

	public function __construct() {
		self::$validator = new Validator;
		$this->rules();
		$this->messages();
	}

	public function rules () {
		self::$validator
			->key('email', Validator::email())
			->key('password', Validator::length(6, 20));
	}

	public function messages () {
		$this->messages = [
			'length'  => 'El {{name}} debe tener entre {{minValue}} y {{maxValue}} caracteres.',
			'email'   => 'El formato del email no es válido.',
		];
	}

	public function getMessages () {
		return $this->messages;
	}

	public function validate () {
		return self::$validator->assert($_POST);
	}
}