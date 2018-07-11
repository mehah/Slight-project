<?php
namespace src\controller;

use src\model\User;
use Slight\http\HttpSession;
use Slight\validator\Validator;

class UserController  {

	public function init(HttpSession $session) {
		$session->destroy();
		
		return "Hello World!";
	}

	public function update($id, $name) {
		return "User id($id) updated to name: $name";
	}

	public function insert(User $user) {
		$msg;
		if (Validator::validate($user)->hasError()) {
			$msg = 'Name is required.';
		} else {
			try {
				$msg = $user->insert() ? 'User inserted.' : 'Error on insert User.';
			} catch (\Exception $e) {
				http_response_code(500);
				$msg = $e->getMessage();
			}
		}
		
		return $msg;
	}

	public function putOnSession(User $user, HttpSession $session) {
		$session->setUserPrincipal($user);
		
		return "User inserted on session.";
	}
}